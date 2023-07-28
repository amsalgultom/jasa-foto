<?php

namespace App\Jobs;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB; // Corrected namespace for DB
use Illuminate\Support\Facades\View;
use App\Models\ItemModelOrder;
use App\Models\Order;
use App\Models\ItemProductOrder;

class GenerateOrderPdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $orders = Order::join('customers', 'orders.customer_id', '=', 'customers.id')
               ->where('date', date('Y-m-d'))
               ->where('status_id', 2)
               ->select('customers.name as cusname', 'orders.*')
               ->get();
            //    print_r($orders);die;
        
        $itemOrderProduct = ItemProductOrder::get();
        $itemOrderModel = ItemModelOrder::all();

        $no = 1;

        $html = View::make('admin.orderday', compact('orders','itemOrderProduct','itemOrderModel', 'no'))->render();

        $options = new Options();
        // $options->setIsRemoteEnabled(true); 
        $options->set('isRemoteEnabled',true); 
        
        $dompdf = new Dompdf($options);
        
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->loadHtml($html);

        $dompdf->render();

        return $dompdf->stream('order-'.date('d-m-Y').'.pdf');
    }

}
