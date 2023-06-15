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
        $models = PhotoModel::all();
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
        $totalOrder = array_sum($request->price_model) + 10000;
        $createOrder = [
            'user_id' => $request->user_id,
            'customer_id' => $generateIdCustomer->id,
            'date' => now(),
            'shipping_costs' => $request->shipping_costs,
            'shipping_method' => $request->shipping_method,
            'total' => $totalOrder,
            'status_id' => 1,
        ];
        $generateIdModel = Order::create($createOrder);

        // Crete Item Model Order
        $resultmodel = array_map(function ($a, $b, $c, $d) {
            return [
                'model_id' => $a,
                'name_model' => $b,
                'price_model' => $c,
                'available_date_model' => $d
            ];
        }, $rq['model'], $rq['name_model'], $rq['price_model'], $rq['available_date_model']);

        $resultmodels = collect($resultmodel);
        foreach ($resultmodels as $resM) {
            $requestModelOrder = [
                'order_id' => $generateIdModel->id,
                'model_id' => $resM['model_id'],
                'name' => $resM['name_model'],
                'price' => $resM['price_model'],
                'available_date' => $resM['available_date_model']
            ];

            ItemModelOrder::create($requestModelOrder);
        }

        // Crete Item Product Order
        $resultproduct = array_map(function ($a, $b) {
            return [
                'product_id' => $a,
                'note' => $b
            ];
        }, $rq['product_id'], $rq['note']);

        $resultproducts = collect($resultproduct);
        foreach ($resultproducts as $resP) {
            $requestProductOrder = [
                'order_id' => $generateIdModel->id,
                'product_id' => $resP['product_id'],
                'note' => $resP['note']
            ];
            ItemProductOrder::create($requestProductOrder);
        }


        return redirect()->route('orders')->with('success', 'Order created successfully.');
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
        return view('client.result', compact('order', 'itemOrderProduct', 'itemOrderModel','itemResultImages'));
    }
}
