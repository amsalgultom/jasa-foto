<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Models\ItemProductOrder;
use App\Models\Order;
use PDF;
use Carbon\Carbon;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {
        $order = Order::find($id);

        $itemOrderProduct = ItemProductOrder::where('order_id', $order->id)
            ->join('products', 'item_product_orders.product_id', '=', 'products.id')
            ->select('item_product_orders.*', 'products.*')
            ->get();

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'order' => $order
        ]; 

        $date_now = Carbon::now();
        $date = $date_now->setTimezone('Asia/Jakarta')->format('H:i:s d-m-Y ');
            
        $pdf = PDF::loadView('admin.document', compact('itemOrderProduct', 'order', 'date'));
     
        return $pdf->stream('itsolutionstuff.pdf');
    }
}