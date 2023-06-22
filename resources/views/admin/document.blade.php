<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Invoice Sales Order</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 12px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }

        .text-right {
            text-align: right !important;
        }

        .text-left {
            text-align: left !important;
        }

        .text-center {
            text-align: center !important;
        }

        .m-0{
            margin: 0 !important; 
        }

        .p-0{
            padding: 0 !important;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="5">
                    <table>
                        <tr>
                            <td style="width: 10%; justify-content: middle;">
                                <img src="{{ public_path('img/logo-min.png') }}" alt="Logo" style="width: 150px; height: auto;">
                                <!-- <h2>Art Space Photoshoot</h2> -->
                            </td>
                            <td class="text-center">
                                <h2 class="m-0 p-0">Art Space Photoshoot</h2>
                                <p class="m-0 p-0">Jasa Foto Produk</p>
                                <p class="m-0 p-0">Jl. Cilangkap Raya No. 21, Kec. Cipayung, Kota Jakarta Timur, DKI Jakarta - 12834</p>
                                <p class="m-0 p-0"> No. Telp : 081232734623 - Fax : 021-12383274</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <hr class="m-0 p-0">

        <table cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="p-0">Pelanggan</td>
                            <td class="p-0">: </td>
                            <td class="p-0">{{ $order->customer?->name }}</td>
                        </tr>
                        <tr>
                            <td class="p-0">No Telp</td>
                            <td class="p-0">: </td>
                            <td class="p-0">{{ $order->customer?->phone }}</td>
                        </tr>
                        <tr>
                            <td class="p-0">Alamat</td>
                            <td class="p-0">: </td>
                            <td class="p-0">{{ $order->customer?->address }}</td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table cellpadding="0" cellspacing="0" style="padding: 0 !important; margin: 0 !important;">
                        <tr>
                            <td class="p-0">Order ID</td>
                            <td class="p-0">: </td>
                            <td class="p-0">#{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <td class="p-0">Date</td>
                            <td class="p-0">: </td>
                            <td class="p-0">{{ $date }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>



        <table cellpadding="0" cellspacing="0">

            <tr class="heading text-left">
                <td class="text-left">Item</td>
                <td class="text-left">Price</td>
                <td class="text-left">QTY</td>
                <td></td>
                <td class="text-left">Sub Total</td>
            </tr>

            @foreach($itemOrderProduct as $item)
            <tr class="total text-left">
                <td class="text-left">{{ $item->name }}</td>
                <td class="text-left">{{ 'Rp '.number_format($item->price, 0, ',', '.') }}</td>
                <td class="text-left">{{ $item->qty }}</td>
                <td></td>
                <td class="text-left">{{ 'Rp '.number_format($item->price * $item->qty, 0, ',', '.') }}</td>
            </tr>
            @endforeach
            <tr class="total text-left">
                <td class="text-left">Kurir - {{ $order->shipping_method }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-left">{{ 'Rp '.number_format($order->shipping_cost, 0, ',', '.') }}</td>
            </tr>
        </table>
        <div class="text-center">
            <h3>Total : {{ 'Rp '.number_format($order->total, 0, ',', '.') }}</h3>
        </div>
    </div>
</body>

</html>