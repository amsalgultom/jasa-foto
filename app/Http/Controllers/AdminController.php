<?php

namespace App\Http\Controllers;

use App\Models\ItemModelOrder;
use App\Models\ItemProductOrder;
use App\Models\UploadResultImage;
use App\Models\Order;
use Illuminate\Http\Request;
use DataTables;
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

    public function listOrders(Request $request)
    {
        $myorders = Order::orderBy('id', 'desc')->get();

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

    public function report(Request $request)
    {
        $myorders = Order::where('status_id',2)->orderBy('id', 'desc')->get();

        if ($request->ajax()) {
            $data = Order::select('*');
  
            if ($request->filled('from_date') && $request->filled('to_date')) {
                $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }
  
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
      
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.report', compact('myorders'))->with('no');
            
    }

}
