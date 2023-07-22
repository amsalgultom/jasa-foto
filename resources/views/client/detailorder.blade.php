@extends('layouts.app')
@section('title', 'ART SPACE - Detail Order')

@section('content')
<!-- Begin Page Content -->
<div class="container">
            <div width="100%">
                <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                    <tbody>
                        <tr>
                            <td align="center" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#fff;border:1px solid #dedede;border-radius:3px" bgcolor="#fff">
                                    <tbody>
                                        <tr>
                                            <td align="center" valign="top">

                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#d4b2a7;color:#fff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0" bgcolor="#7a6429">
                                                    <tbody>
                                                        <tr>
                                                            <td class="p-4">
                                                                <h2><span class="il">Order Id : </span> #{{ $order->id }}</h2>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_7158390659536495837template_body">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="top" id="m_7158390659536495837body_content" style="background-color:#fff" bgcolor="#fff">
                                                                <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td valign="top" style="padding:48px 48px 0px">
                                                                                <div id="m_7158390659536495837body_content_inner" style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left" align="left">
                                                                                    <div class="d-flex justify-content-between">
                                                                                        <h2 style="color:#d4b2a7;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
                                                                                            [<span class="il">Order</span> #{{ $order->id }}] | {{ \Carbon\Carbon::parse($order->date)->format('d M Y') }}
                                                                                        </h2>
                                                                                        <h2 style="color:#d4b2a7;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
                                                                                            <span class="il">Status : </span> {{$order->status?->name}}
                                                                                        </h2>

                                                                                    </div>

                                                                                    <div style="margin-bottom:40px">
                                                                                        <table cellspacing="0" cellpadding="6" border="1" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" width="100%">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th class="text-center" scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">Nama Model</th>
                                                                                                    <th class="text-center" scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">Foto Model</th>
                                                                                                    <th class="text-center" scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">Tanggal Foto</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @foreach ($itemOrderModel as $itemmodel)
                                                                                                <tr>
                                                                                                    <td class="text-center" style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word" align="left">
                                                                                                        {{$itemmodel->name}}
                                                                                                    </td>
                                                                                                    <td class="text-center" style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" align="left"><img src="{{ asset('uploads-images/models/').'/'.$itemmodel->image }}" alt="{{ $itemmodel->name }}" width="100"></td>
                                                                                                    <td class="text-center" style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" align="left">
                                                                                                        {{$itemmodel->available_date}}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_7158390659536495837template_body">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="top" id="m_7158390659536495837body_content" style="background-color:#fff" bgcolor="#fff">
                                                                <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td valign="top" style="padding:0px 48px">

                                                                                <div id="m_7158390659536495837body_content_inner" style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left" align="left">
                                                                                    <div style="margin-bottom:40px">
                                                                                        <table cellspacing="0" cellpadding="6" border="1" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" width="100%">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">Product</th>
                                                                                                    <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">Tipe</th>
                                                                                                    <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">Note</th>
                                                                                                    <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">Price</th>
                                                                                                    <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">Qty</th>
                                                                                                    <th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">Sub Total</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @foreach ($itemOrderProduct as $itemproduct)
                                                                                                <tr>
                                                                                                    <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word" align="left">
                                                                                                        {{$itemproduct->modelname}} - {{$itemproduct->name}}
                                                                                                    </td>
                                                                                                    <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" align="left">
                                                                                                        {{$itemproduct->type}}
                                                                                                    </td>
                                                                                                    <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" align="left">
                                                                                                        {{$itemproduct->note_product}}
                                                                                                    </td>
                                                                                                    <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" align="left">
                                                                                                        {{ 'Rp '.number_format($itemproduct->price_product, 0, ',', '.') }}
                                                                                                    </td>
                                                                                                    <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" align="left">
                                                                                                        {{ $itemproduct->qty_product }}
                                                                                                    </td>
                                                                                                    <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" align="left">
                                                                                                        {{ 'Rp '.number_format($itemproduct->sub_total_product, 0, ',', '.') }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="top">

                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_7158390659536495837template_body">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="top" id="m_7158390659536495837body_content" style="background-color:#fff" bgcolor="#fff">
                                                                <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td valign="top" style="padding:0px 48px">
                                                                                <div id="m_7158390659536495837body_content_inner" style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left" align="left">
                                                                                    <div style="margin-bottom:40px">
                                                                                        <table cellspacing="0" cellpadding="6" border="1" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif" width="100%">
                                                                                            <tr>
                                                                                                <th scope="row" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;" align="left">Referensi Foto Produk:</th>
                                                                                                <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;" align="left">
                                                                                                    @if($order->image_referensi_product)
                                                                                                    <?php $data = json_decode($order->image_referensi_product); ?>
                                                                                                    @foreach($data as $img)
                                                                                                    <img src="{{ asset('uploads-images/referensi/').'/'.$img }}" width="150" alt="">
                                                                                                    @endforeach
                                                                                                    @endif
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;" align="left">Subtotal:</th>
                                                                                                <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;" align="left"><span>{{ 'Rp '.number_format($order->total - $order->shipping_costs, 0, ',', '.') }}</span></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">Shipping:</th>
                                                                                                <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">
                                                                                                    <span>{{ 'Rp '.number_format($order->shipping_costs, 0, ',', '.') }}</span>&nbsp;<small>via JNE ({{ $order->shipping_method }})</small>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">Total:</th>
                                                                                                <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">
                                                                                                    <span>{{ 'Rp '.number_format($order->total, 0, ',', '.') }}</span>
                                                                                                </td>
                                                                                            </tr>
                                                                                            </tfoot>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection