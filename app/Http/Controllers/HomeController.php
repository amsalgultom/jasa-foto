<?php

namespace App\Http\Controllers;

use App\Models\PhotoModel;

use App\Models\Order;
use App\Models\Customer;
use App\Models\ItemModelOrder;
use App\Models\ItemProductOrder;
use App\Models\PhotoBackground;
use App\Models\Product;
use App\Models\UploadResultImage;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $models = PhotoModel::orderBy('id', 'desc')->get();
        return view('pages.home', compact('models'));
    }
    public function ourservices()
    {
        return view('pages.ourservices');
    }

    public function procedure()
    {
        return view('pages.procedure');
    }

    /**
     * Display a listing of the resource.
     */
    public function userOrder()
    {
        $client = new Client();
        $origins = [];
        // $response = $client->request('GET', config('services.rajaongkir.base_url') . '/city', [
        //     'headers' => [
        //         'key' => config('services.rajaongkir.api_key')
        //     ]
        // ]);

        // $result = json_decode($response->getBody(), true);

        // $origins = $result['rajaongkir']['results'];
        $models = PhotoModel::orderBy('id', 'desc')->get();
        $products = Product::where('type', 'Product Foto')->get();
        $productsoptional = Product::where('type', 'Our Service')->get();
        $productsoptional = Product::where('type', 'Our Service')->get();
        $photobackgrounds = PhotoBackground::where('status', 'Aktif')->get();
        return view('pages.orderservice', compact('models', 'products', 'productsoptional', 'origins','photobackgrounds'));
    }

    public function myorderservices($user_id)
    {
        $myorders = Order::where('user_id', $user_id)->get();
        return view('pages.myorderservices', compact('myorders'))->with('no');
    }

    /**
     * Display the specified resource.
     */
    public function myorderservicesShow(Order $order)
    {
        $itemOrderProduct = ItemProductOrder::where('order_id', $order->id)
            ->join('products', 'item_product_orders.product_id', '=', 'products.id')
            ->join('models', 'products.model_id', '=', 'models.id')
            ->select('item_product_orders.*', 'products.*', 'models.name as modelname')
            ->get();
        $itemOrderModel = ItemModelOrder::where('order_id', $order->id)
            ->join('models', 'item_model_orders.model_id', '=', 'models.id')
            ->select('item_model_orders.*', 'models.*')
            ->get();
        // print_r(json_encode($itemOrderModel));die;
        return view('pages.detailorderservice', compact('order', 'itemOrderProduct', 'itemOrderModel'));
    }

    /**
     * Display the specified resource.
     */
    public function resultorderservicesUpload(Order $order)
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
        return view('pages.resultorderservice', compact('order', 'itemOrderProduct', 'itemOrderModel', 'itemResultImages'));
    }

    public function paymentorderservice(Request $request)
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
            ->join('models', 'products.model_id', '=', 'models.id')
            ->select('item_product_orders.*', 'products.*', 'models.name as modelname')
            ->get();
        return view('pages.paymentorderservice', compact('snapToken', 'order', 'itemOrderProduct'));
    }
}
