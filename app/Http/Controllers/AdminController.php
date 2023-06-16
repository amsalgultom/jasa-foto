<?php

namespace App\Http\Controllers;

use App\Models\ItemModelOrder;
use App\Models\ItemProductOrder;
use App\Models\UploadResultImage;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function store(Request $request)
    {
        $images = [];


        if ($request->hasFile('images')) {
            $files = $request->file('images');

            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $imageName = time() .'-'. $name;
                $file->move(public_path('uploads-images/results'), $imageName);
                $image = new UploadResultImage();
                $image->images = $imageName;
                $image->order_id = $request->order_id;
                $image->save();

                $images[] = $image;
            }
        }

        Order::where('id', $request->order_id)->update(['status_id' => 3]);

        return redirect('listorders')->with('success','Upload Images successfully.');
    }

    public function listOrders()
    {
        $myorders = Order::all();
        return view('admin.listorders', compact('myorders'))->with('no');
    }

    /**
     * Display the specified resource.
     */
    public function orderUpload(Order $order)
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
        return view('admin.orderupload', compact('order', 'itemOrderProduct', 'itemOrderModel','itemResultImages'));
    }
}
