<!DOCTYPE html>
<html>
<head>
	<title>ArtSpace Photoshoot - Print Shipping</title>

    <style>
        .row::after {
            content: "";
            clear: both;
            display: table;
        }
        [class*="col-"] {
            padding: 10px;
            float: left;
        }
        .col-1 {width: 8.33%;}
        .col-2 {width: 16.66%;}
        .col-3 {width: 25%;}
        .col-4 {width: 33.33%;}
        .col-5 {width: 41.66%;}
        .col-6 {width: 50%;}
        .col-7 {width: 58.33%;}
        .col-8 {width: 66.66%;}
        .col-9 {width: 75%;}
        .col-10 {width: 83.33%;}
        .col-11 {width: 91.66%;}
        .col-12 {width: 100%;}

        * {
        box-sizing: border-box;
        }
    </style>
</head>
<body>


<!-- Begin Page Content -->


            <!-- Style border atas bawah -->
        <div style="max-height: 100%;border: 2px solid #c6c6c6; padding: 2px; border-top-style: none;border-right-style: dotted;border-bottom-style: none;border-left-style: dotted;">
            <table style="width: 100%; border-top: 4px solid #c6c6c6; border-bottom: 4px solid #c6c6c6;">
                <thead>
                    <tr>
                        <th style="text-align: left; font-size: 12px;">
                            Metode Kirim
                        </th>
                        <th style="text-align: right; font-size: 12px;">
                            Order ID
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: left ;">
                            JNE {{ $orders->shipping_method }}
                        </td>
                        <td style="text-align: right;">
                            #{{ $orders->id }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row" style="">
                <div class="col-6" style="">
                    <table style="line-height: 1; width: 100% !important;">
                        <thead>
                            <tr>
                                <th style="text-align: left;font-size: 14px;">
                                    Penerima
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-size: 10px;">
                                    {{ $customers->name }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px;">
                                    {{ $customers->phone }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px;">
                                    {{ $customers->address }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px;">
                                    {{ $customers->city }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px;">
                                    {{ $customers->post_code }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-6" style="border-right: 4px solid #c6c6c6;">
                    <table style="line-height: 1; width: 100% !important;">
                        <thead>
                            <tr>
                                <th style="text-align: left;font-size: 14px;">
                                    Pengirim
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-size: 10px; width: 3%;">
                                    ArtSpace
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px;">
                                    No. Artspace
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px;">
                                    Alamat Artspace
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px;">
                                    Jakarta Timur
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 10px;">
                                    {{ $customers->post_code }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            
            
            <table style="width: 100%; text-align:left;border: 1px solid #c6c6c6;border-collapse: collapse;margin-top: 5px;">
                <thead>
                    <tr>
                        <th scope="col" style="font-size: 10px;border: 1px solid black;border-collapse: collapse;">No</th>
                        <th scope="col" style="font-size: 10px;border: 1px solid black;border-collapse: collapse;">Product</th>
                        <th scope="col" style="font-size: 10px;border: 1px solid black;border-collapse: collapse;">Tipe</th>
                        <th scope="col" style="font-size: 10px;border: 1px solid black;border-collapse: collapse;">Qty</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($itemOrderProduct as $itemproduct)
                    <tr>
                        <td style="font-size: 10px;border: 1px solid black;border-collapse: collapse;">
                            {{$no++}}
                        </td>
                        <td style="font-size: 10px;border: 1px solid black;border-collapse: collapse;">
                            {{$itemproduct->modelname}} - {{$itemproduct->name}}
                        </td>
                        <td style="font-size: 10px;border: 1px solid black;border-collapse: collapse;">
                            {{$itemproduct->type}}
                        </td>
                        <td style="font-size: 10px;border: 1px solid black;border-collapse: collapse;">
                            {{ $itemproduct->qty_product }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>