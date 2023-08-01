<!DOCTYPE html>
<html>

<head>
    <title>ArtSpace Photoshoot - Print Order Today</title>

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

        .col-1 {
            width: 8.33%;
        }

        .col-2 {
            width: 16.66%;
        }

        .col-3 {
            width: 25%;
        }

        .col-4 {
            width: 33.33%;
        }

        .col-5 {
            width: 41.66%;
        }

        .col-6 {
            width: 50%;
        }

        .col-7 {
            width: 58.33%;
        }

        .col-8 {
            width: 66.66%;
        }

        .col-9 {
            width: 75%;
        }

        .col-10 {
            width: 83.33%;
        }

        .col-11 {
            width: 91.66%;
        }

        .col-12 {
            width: 100%;
        }

        * {
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <table style="width: 100%; margin-bottom: 20px; ">
        <thead>
            <tr>
                <th style="text-align: left; font-size: 16px;">
                    ArtSpace
                </th>
                <th style="text-align: right; font-size: 16px;">
                    Tanggal
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: left ;">
                    Photoshoot
                </td>
                <td style="text-align: right;">
                    {{ \Carbon\Carbon::now()->format('d M Y') }}
                </td>
            </tr>
        </tbody>
    </table>
    <table style="width: 100%; text-align:left;border: 1px solid #c6c6c6;border-collapse: collapse;margin-top: 5px;">
        <thead>
            <tr>
                <th scope="col" style="font-size: 14px;border: 1px solid black;border-collapse: collapse; width: 5%; text-align: center;">No</th>
                <th scope="col" style="font-size: 14px;border: 1px solid black;border-collapse: collapse; width: 20%;">Customer</th>
                <th scope="col" style="font-size: 14px;border: 1px solid black;border-collapse: collapse; width: 20%;">Item Catalog</th>
                <th scope="col" style="font-size: 14px;border: 1px solid black;border-collapse: collapse; width: 20%;">Model</th>
                <th scope="col" style="font-size: 14px;border: 1px solid black;border-collapse: collapse; width: 20%;">Referensi Foto</th>
                <th scope="col" style="font-size: 14px;border: 1px solid black;border-collapse: collapse; width: 20%;">Background</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $o)
            <tr>
                <td style="font-size: 14px;border: 1px solid black;border-collapse: collapse; text-align: center;">
                    {{ $no++ }}
                </td>
                <td style="font-size: 14px;border: 1px solid black;border-collapse: collapse; text-align: center;">
                    &nbsp;{{ $o->cusname }}
                </td>
                <td style="font-size: 14px;border: 1px solid black;border-collapse: collapse;">
                    @foreach ($itemOrderProduct as $p)
                    @if($o->id == $p->order_id)
                    &nbsp;{{ $p->qty_product }}x &nbsp;{{ $p->name_product }} &nbsp;@if($p->note),({{ $p->note }})@endif <br>
                    
                    @endif
                    @endforeach
                </td>
                <td style="font-size: 14px;border: 1px solid black;border-collapse: collapse; text-align: center;">
                    @foreach ($itemOrderModel as $m)
                    @if($o->id == $m->order_id)
                    &nbsp;{{ $m->name }} <br>
                    @endif
                    @endforeach
                </td>
                <td style="font-size: 14px;border: 1px solid black;border-collapse: collapse; text-align: center;">
                    @if($o->image_referensi_product != '[]')
                    <?php $data = json_decode($o->image_referensi_product); ?>
                    @foreach($data as $img)
                    <img src="{{ asset('uploads-images/referensi/').'/'.$img }}" width="150" alt=""  loading="lazy">
                    @endforeach
                    @else
                    -
                    @endif
                </td>
                <td style="font-size: 14px;border: 1px solid black;border-collapse: collapse; text-align: center;">
                @if($o->photobackground != '')
                    <?php $data = json_decode($o->photobackground); ?>
                    <img src="{{ asset('uploads-images/referensi/').'/'.$img }}" width="150" alt=""  loading="lazy">
                    @else
                    -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>