<?php

namespace App\Http\Controllers;

use App\Models\PhotoModel;

use App\Models\Order;
use App\Models\Customer;
use App\Models\ItemModelOrder;
use App\Models\ItemProductOrder;
use App\Models\Product;
use App\Models\UploadResultImage;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $models = PhotoModel::all();
        return view('pages.home', compact('models'));
    }

    /**
     * Display a listing of the resource.
     */
    public function userOrder()
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
        return view('pages.orderservice', compact('models', 'products', 'productsmodel', 'productshoes', 'origins'));
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
            ->select('item_product_orders.*', 'products.*')
            ->get();
        $itemOrderModel = ItemModelOrder::where('order_id', $order->id)
            ->join('models', 'item_model_orders.model_id', '=', 'models.id')
            ->select('item_model_orders.*', 'models.*')
            ->get();
        // print_r(json_encode($itemOrderModel));die;
        return view('client.detailorder', compact('order', 'itemOrderProduct', 'itemOrderModel'));
    }
}
