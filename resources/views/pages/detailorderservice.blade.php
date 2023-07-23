@extends('layout-users.app')
@section('title', 'ArtSpace Photoshoot')

@section('content')
<!-- Begin Page Content -->

<main id="main">
    <section>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header id-order">  
                    <h2><span class="il">Order Id : </span> #{{ $order->id }}</h2>
                </div>
                <div class="d-flex justify-content-between">
                    <h2 class="status">
                        [<span class="il">Order</span> #{{ $order->id }}] | {{ \Carbon\Carbon::parse($order->date)->format('d M Y') }}
                    </h2>
                    <h2 class="status">
                        <span class="il">Status : </span> {{$order->status?->name}}
                    </h2>
                </div>
                <div class="mb-table">
                    <table cellspacing="0" cellpadding="6" border="1" class="table-model-order mx-auto tabel-top-order">
                        <thead>
                            <tr>
                                <th class="text-center text-table" scope="col">Nama Model</th>
                                <th class="text-center text-table" scope="col">Foto Model</th>
                                <th class="text-center text-table" scope="col">Tanggal Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($itemOrderModel as $itemmodel)
                            <tr>
                                <td class="text-center text-table">
                                    {{$itemmodel->name}}
                                </td>
                                <td class="text-center text-table"><img src="{{ asset('uploads-images/models/').'/'.$itemmodel->image }}" alt="{{ $itemmodel->name }}" width="100"></td>
                                <td class="text-center text-table">
                                    {{$itemmodel->available_date}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                 
                <div class="mb-table">
                    <table cellspacing="0" cellpadding="6" border="1" class="table-model-order mx-auto tabel-mid-order">
                        <thead>
                            <tr>
                                <th scope="col" class="text-table">Product</th>
                                <th scope="col" class="text-table">Tipe</th>
                                <th scope="col" class="text-table">Note</th>
                                <th scope="col" class="text-table">Price</th>
                                <th scope="col" class="text-table">Qty</th>
                                <th scope="col" class="text-table">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($itemOrderProduct as $itemproduct)
                            <tr>
                                <td class="text-table">
                                    {{$itemproduct->modelname}} - {{$itemproduct->name}}
                                </td>
                                <td class="text-table">
                                    {{$itemproduct->type}}
                                </td>
                                <td class="text-table">
                                    {{$itemproduct->note_product}}
                                </td>
                                <td class="text-table">
                                    {{ 'Rp '.number_format($itemproduct->price_product, 0, ',', '.') }}
                                </td>
                                <td class="text-table">
                                    {{ $itemproduct->qty_product }}
                                </td>
                                <td class="text-table">
                                    {{ 'Rp '.number_format($itemproduct->sub_total_product, 0, ',', '.') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mb-table">
                    <table cellspacing="0" cellpadding="6" border="1" class="table-model-order mx-auto tabel-bottom-order">
                        <tr>
                            <td scope="row" class="text-table">Referensi Foto Produk:</td>
                            <td class="text-table">
                                @if($order->image_referensi_product != '[]')
                                <?php $data = json_decode($order->image_referensi_product); ?>
                                @foreach($data as $img)
                                <img src="{{ asset('uploads-images/referensi/').'/'.$img }}" width="150" alt="">
                                @endforeach
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" class="text-table">Foto Background:</td>
                            <td class="text-table">
                                @if($order->photobackground)
                                <img src="{{ asset('uploads-images/photobackgrounds/').'/'.$order->photobackground }}" width="150" alt="">
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" class="text-table">Subtotal:</td>
                            <td class="text-table"><span>{{ 'Rp '.number_format($order->total - $order->shipping_costs + $order->discount, 0, ',', '.') }}</span></td>
                        </tr>
                        <tr>
                            <td scope="row" class="text-table">Shipping:</td>
                            <td class="text-table">
                                @if($order->shipping_method)
                                <span>{{ 'Rp '.number_format($order->shipping_costs, 0, ',', '.') }}</span>&nbsp;<small>via JNE ({{ $order->shipping_method }})</small>
                                @else
                                COD
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" class="text-table">Voucher Diskon:</td>
                            <td class="text-table">
                                @if($order->voucher)
                                <span>{{ 'Rp '.number_format($order->discount, 0, ',', '.') }}</span>&nbsp;<small>({{ $order->voucher }})</small>
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" class="text-table">Total:</td>
                            <td class="text-table">
                                <span>{{ 'Rp '.number_format($order->total, 0, ',', '.') }}</span>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                    @if($order->status?->name == 'UnPaid')
                    <div class="text-center my-5">
                        <form action="{{ route('myorderservices.payment') }}" method="POST">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <input type="hidden" name="gross_amount" value="{{ $order->total }}">
                            <input type="hidden" name="first_name" value="{{ $order->customer?->name }}">
                            <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                            <input type="hidden" name="phone" value="{{ $order->customer?->phone }}">
                            <button type="submit" class="btn btn-primary">Lakukan Pembayaran</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>
@endsection