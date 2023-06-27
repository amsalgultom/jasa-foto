@extends('layout-users.app')
@section('title', 'ArtSpace Photoshoot')

@push('heads')
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
@endpush

@section('content')
<main id="main">
    <section><br><br><br>
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

                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#7a6429;color:#fff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0" bgcolor="#7a6429">
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
                                                                                    <h2 style="color:#7a6429;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
                                                                                        [<span class="il">Order</span> #{{ $order->id }}] | {{ \Carbon\Carbon::parse($order->date)->format('d M Y') }}
                                                                                    </h2>

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
                                                                                                        @if ($itemproduct->note_product == null)
                                                                                                        -
                                                                                                        @else
                                                                                                        {{$itemproduct->note_product}}
                                                                                                        @endif
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
                                                                                            <tfoot>
                                                                                                <tr>
                                                                                                    <th scope="row" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px;" align="left" colspan="5">Subtotal:</th>
                                                                                                    <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px;" align="left"><span>{{ 'Rp '.number_format($order->total - $order->shipping_costs, 0, ',', '.') }}</span></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left" colspan="5">Shipping:</th>
                                                                                                    <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">
                                                                                                        <span>{{ 'Rp '.number_format($order->shipping_costs, 0, ',', '.') }}</span>&nbsp;<small>via JNE ({{ $order->shipping_method }})</small>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left" colspan="5">Total:</th>
                                                                                                    <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left" align="left">
                                                                                                        <span>{{ 'Rp '.number_format($order->total, 0, ',', '.') }}</span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tfoot>
                                                                                        </table>
                                                                                        <div class="form-group mt-3">
                                                                                            <div class="custom-control custom-checkbox small">
                                                                                                <input type="checkbox" class="custom-control-input" id="confirmprosedur">
                                                                                                <label class="custom-control-label h6" for="confirmprosedur">Setuju terkait <a href="{{ route('procedure') }}">prosedur</a> yang diberikan</label>
                                                                                                <div class="text-danger d-none" id="requiredcheck">Setujui prosedur diperlukan untuk lakukan pembayaran</div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="my-1 text-center">
                                                                                            <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
                                                                                        </div>
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
    </section>
</main>
@endsection

@push('scripts')

<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var check = document.getElementById('confirmprosedur');
    var labelrequiredcheck = document.getElementById('requiredcheck');
    $("#confirmprosedur").on('change', function() {
        if (this.checked == true) {
            labelrequiredcheck.classList.add('d-none')
        }else{
            labelrequiredcheck.classList.add('d-none')
        }
    })
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
        if (check.checked == false) {
            labelrequiredcheck.classList.remove('d-none')
            return false
        } else {
            labelrequiredcheck.classList.add('d-none')
        }
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$snapToken}}', {
            onSuccess: function(result) {
                /* You may add your own implementation here */
                // alert("payment success!");
                window.location.href = '/myorderservices/show/{{ $order->id }}'
                console.log(result);
            },
            onPending: function(result) {
                /* You may add your own implementation here */
                alert("wating your payment!");
                console.log(result);
            },
            onError: function(result) {
                /* You may add your own implementation here */
                alert("payment failed!");
                console.log(result);
            },
            onClose: function() {
                /* You may add your own implementation here */
                alert('you closed the popup without finishing the payment');
            }
        })
    });
</script>

@endpush