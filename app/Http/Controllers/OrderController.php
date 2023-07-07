<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PhotoModel;
use App\Models\Product;
use App\Models\Customer;
use App\Models\ItemModelOrder;
use App\Models\ItemProductOrder;
use App\Models\UploadResultImage;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();

        $response = $client->request('GET', config('services.rajaongkir.base_url') . '/city', [
            'headers' => [
                'key' => config('services.rajaongkir.api_key')
            ]
        ]);

        $result = json_decode($response->getBody(), true);

        $origins = $result['rajaongkir']['results'];
        $models = PhotoModel::orderBy('id', 'desc')->get();
        $products = Product::where('type', 'Produk Utama')->get();
        $productsmodel = Product::where('type', 'Model Kerudung')->get();
        $productshoes = Product::where('type', 'Aksesoris Sepatu')->get();
        return view('client.order', compact('models', 'products', 'productsmodel', 'productshoes', 'origins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rq = $request->all();

        // Create Customer
        $createCustomer = [
            'name' => $request->name,
            'phone' => $request->phone,
            'city' => $request->city,
            'post_code' => $request->post_code,
            'address' => $request->address,
        ];
        $generateIdCustomer = Customer::create($createCustomer);

        // Create Order

        if ($request->hasFile('image_referensi_product')) {
            $uploadedImages = [];
            foreach ($request->file('image_referensi_product') as $image) {
                $uploadedImages[] = $this->uploadImage($image);
            }
        }

        $totalOrder = array_sum($request->sub_total_product) + $request->shipping_costs;
        $createOrder = [
            'user_id' => $request->user_id,
            'customer_id' => $generateIdCustomer->id,
            'date' => now(),
            'shipping_costs' => $request->shipping_costs,
            'shipping_method' => $request->shipping_method,
            'total' => $totalOrder,
            'status_id' => 1,
            'image_referensi_product' => json_encode($uploadedImages),
        ];
        $generateIdOrder = Order::create($createOrder);

        // Crete Item Model Order
        $resultmodel = array_map(function ($a, $b, $c) {
            return [
                'model_id' => $a,
                'name_model' => $b,
                'available_date_model' => $c
            ];
        }, $rq['model_id'], $rq['name_model'], $rq['available_date_model']);

        $resultmodels = collect($resultmodel);
        foreach ($resultmodels as $resM) {
            $requestModelOrder = [
                'order_id' => $generateIdOrder->id,
                'model_id' => $resM['model_id'],
                'name' => $resM['name_model'],
                'available_date' => $resM['available_date_model']
            ];

            ItemModelOrder::create($requestModelOrder);
        }

        // Create Item Product Order
        $resultproduct = array_map(function ($a, $b, $c, $d, $e, $f) {
            return [
                'product_id' => $a,
                'name_product' => $b,
                'price_product' => $c,
                'qty_product' => $d,
                'sub_total_product' => $e,
                'note_product' => $f
            ];
        }, $rq['product_id'], $rq['name_product'], $rq['price_product'], $rq['qty_product'], $rq['sub_total_product'], $rq['note_product']);

        $resultproducts = collect($resultproduct);

        foreach ($resultproducts as $resP) {
            $requestProductOrder = [
                'order_id' => $generateIdOrder->id,
                'product_id' => $resP['product_id'],
                'name_product' => $resP['name_product'],
                'price_product' => $resP['price_product'],
                'qty_product' => $resP['qty_product'],
                'sub_total_product' => $resP['sub_total_product'],
                'note_product' => $resP['note_product']
            ];

            ItemProductOrder::create($requestProductOrder);
        }
        return redirect()->route('myorderservices', $request->user_id)->with('success', 'Order created successfully.');
    }

    private function uploadImage($image)
    {
        // Generate a unique name for the image
        $imageName = time() . '_' . $image->getClientOriginalName();

        // Move the uploaded image to the desired location
        $image->move(public_path('uploads-images/referensi'), $imageName);

        // Return the path or any relevant information about the uploaded image
        return $imageName;
    }


    public function myorderservices($user_id)
    {
        $myorders = Order::where('user_id', $user_id)->get();
        return view('pages.myorderservices', compact('myorders'))->with('no');
    }

    public function myorders($user_id)
    {
        $myorders = Order::where('user_id', $user_id)->get();
        return view('client.myorders', compact('myorders'))->with('no');
    }

    public function payment(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $request->order_id,
                'gross_amount' => $request->gross_amount,
            ),
            'customer_details' => array(
                'first_name' => $request->first_name,
                'last_name' => '',
                'email' => $request->email,
                'phone' => $request->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $order = Order::where('id', $request->order_id)->first();
        $itemOrderProduct = ItemProductOrder::where('order_id', $request->order_id)
            ->join('products', 'item_product_orders.product_id', '=', 'products.id')
            ->select('item_product_orders.*', 'products.*')
            ->get();
        $itemOrderModel = ItemModelOrder::where('order_id', $request->order_id)
            ->join('models', 'item_model_orders.model_id', '=', 'models.id')
            ->select('item_model_orders.*', 'models.*')
            ->get();
        return view('client.payment', compact('snapToken', 'order', 'itemOrderProduct', 'itemOrderModel'));
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'settlement' || $request->transaction_status == 'capture' ) {
                Order::where('id', $request->order_id)->update(['status_id' => 2]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $itemOrderProduct = ItemProductOrder::where('order_id', $order->id)
            ->join('products', 'item_product_orders.product_id', '=', 'products.id')
            ->select('item_product_orders.*', 'products.*')
            ->get();
        $itemOrderModel = ItemModelOrder::where('order_id', $order->id)
            ->join('models', 'item_model_orders.model_id', '=', 'models.id')
            ->select('item_model_orders.*', 'models.*')
            ->get();
        // print_r(json_encode($itemOrderModel));die;
        return view('client.detailorder', compact('order', 'itemOrderProduct', 'itemOrderModel'));
    }

    /**
     * Display the specified resource.
     */
    public function resultUpload(Order $order)
    {
        $itemOrderProduct = ItemProductOrder::where('order_id', $order->id)
            ->join('products', 'item_product_orders.product_id', '=', 'products.id')
            ->select('item_product_orders.*', 'products.*')
            ->get();
        $itemOrderModel = ItemModelOrder::where('order_id', $order->id)
            ->join('models', 'item_model_orders.model_id', '=', 'models.id')
            ->select('item_model_orders.*', 'models.*')
            ->get();
        $itemResultImages = UploadResultImage::where('order_id', $order->id)
            ->get();
        // print_r(json_encode($itemOrderModel));die;
        return view('client.result', compact('order', 'itemOrderProduct', 'itemOrderModel', 'itemResultImages'));
    }
}
