@extends('layouts.app')
@section('title', 'Jasa Foto - Dashboard')

@section('content')


<!-- Begin Page Content -->
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error!</strong> <br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="text-center my-5">
        <h1>Form Pemesanan Jasa Foto</h1>
    </div>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h4>Pilih Model:</h4>
                    @foreach ($models as $model)
                    <div class="row my-2">
                        <div class="col-md-10">
                            <div class="d-flex align-items-center" style="justify-content: space-evenly;">
                                <p>Nama : <br> {{ $model->name }}</p>
                                <img src="{{ asset('uploads-images/models/').'/'.$model->image }}" alt="{{ $model->name }}" width="200">
                                <p>Catalog Shoot</p>
                                <p>{{ $model->available_date }}</p>
                            </div>
                        </div>
                        <div class="col-md-2 m-auto">
                            <input type="checkbox" class="form-control" name="model[]" onclick="buttonPriceModel(this)" value="{{ $model->id }}" />
                            <input type="hidden" name="price_model[]" id="priceModel{{ $model->id }}" value="{{ $model->price }}" disabled>
                            <input type="hidden" name="name_model[]" id="nameModel{{ $model->id }}" value="{{ $model->name }}" disabled>
                            <input type="hidden" name="available_date_model[]" id="available_dateModel{{ $model->id }}" value="{{ $model->available_date }}" disabled>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h4 class="mt-5 mb-3">Daftarkan Produk Anda:</h4>

                    <buuton id="buttunAddProduct" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Produk</buuton><br><br>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <strong>Product</strong><br>
                            <select name="product_id[]" class="form-control select-so w-100" required>
                                <option value="" hidden>-- Pilih Product --</option>
                                @foreach ($products as $prod)
                                <option value="{{$prod->id}}" data-weight="{{$prod->weight}}">{{$prod->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8">
                            <div class="form-group">
                                <strong>Request</strong>
                                <textarea class="form-control" style="height:100px" name="note[]" placeholder="Notes"></textarea>
                            </div>
                        </div>
                    </div>

                    <div id="addProduct"></div>
                    <input type="hidden" name="weight" id="weight" value="" required>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <h4 class="mt-5 mb-3">Tambahan Lainnya jika diperlukan:</h4>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <strong>Model Kerudung</strong><br>
                            <select name="product_model" class="form-control select-so w-100">
                                <option value="">-- Pilih Model Kerudung --</option>
                                @foreach ($productsmodel as $prodsmodel)
                                <option value="{{$prodsmodel->id}}">{{$prodsmodel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <strong>Sepatu</strong><br>
                            <select name="sub_product" class="form-control select-so w-100">
                                <option value="">-- Pilih Product Sepatu --</option>
                                @foreach ($productshoes as $prodshoes)
                                <option value="{{$prodshoes->id}}">{{$prodshoes->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h4 class="mt-5 mb-3">Isi Data Diri:</h4>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Nama" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>No HP:</strong>
                    <input type="number" name="phone" class="form-control" placeholder="0813xxxx" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <label for="origin">Kota:</label>
                <select name="city" id="origin" class="form-control w-100" required>
                    <option value="" hidden>-- Pilih Kota --</option>
                    @foreach ($origins as $origin)
                    <option value="{{ $origin['city_id'] }}">{{ $origin['city_name'] }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="destination" id="destination" value="151">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Kode Pos:</strong>
                    <input type="number" name="post_code" class="form-control" placeholder="Kode Pos" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat Lengkap:</strong>
                    <textarea class="form-control" style="height:150px" name="address" placeholder="Jl. Raya Blok A. No51, Rt.001/01. Kel.Lorem, Kec.Lorem. Cipayung, Jakarta Timur"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div id="results"></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center my-5">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <button type="submit" class="btn btn-primary">Buat Order</button>
            </div>
        </div>
    </form>


</div>

@endsection

@push('scripts')
<script>

    function buttonPriceModel(checkbox) {
        var hiddenInput = document.getElementById("priceModel" + checkbox.value);
        var hiddenInputName = document.getElementById("nameModel" + checkbox.value);
        var hiddenInputDate = document.getElementById("available_dateModel" + checkbox.value);
        if (checkbox.checked) {
            hiddenInput.disabled = false;
            hiddenInputName.disabled = false;
            hiddenInputDate.disabled = false;
        } else {
            hiddenInput.disabled = true;
            hiddenInputName.disabled = true;
            hiddenInputDate.disabled = true;
        }
    }

    function buttonOngkirModel(radio) {
        var hiddenInputCosts = document.querySelectorAll('[id^="shipping_costs"]');

        // Disable all hidden input fields
        for (var i = 0; i < hiddenInputCosts.length; i++) {
            hiddenInputCosts[i].disabled = true;
        }

        var hiddenInputCost = document.getElementById("shipping_costs" + radio.value);

        if (radio.checked) {
            hiddenInputCost.disabled = false;
        }
    }

    $('select[name="product_id[]"]').change(function() {
        var totalWeight = 0;

        $('select[name="product_id[]"] option:selected').each(function() {
            var weight = parseInt($(this).data('weight'));

            if (!isNaN(weight)) {
                totalWeight += weight;
            }
        });

        $('#weight').val(totalWeight);
    });

    $(document).ready(function() {

        var i = 1;
        $("#buttunAddProduct").click(function() {
            i++;
            var datahtml1 = `
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <strong>Product</strong><br>
                    <select name="product_id[]" class="form-control select-so w-100" required>
                        <option value="" hidden>-- Pilih Product --</option>
                        @foreach ($products as $prod)
                        <option value="{{$prod->id}}">{{$prod->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8">
                    <div class="form-group">
                        <strong>Request</strong>
                        <textarea class="form-control" style="height:100px" name="note[]" placeholder="Notes"></textarea>
                    </div>
                </div>
            </div> `
            $("#addProduct").append(datahtml1);
        });
    });

    $(document).ready(function() {
        $('#origin').change(function() {
            var originId = $('#origin').val();
            var destinationId = $('#destination').val();
            var weight = $('#weight').val();

            $.ajax({
                url: '/calculate-shipping',
                method: 'GET',
                data: {
                    origin_id: originId,
                    destination_id: destinationId,
                    weight: weight
                },
                success: function(response) {
                    var results = response.results;

                    $('#results').empty();

                    if (results.length === 0) {
                        $('#results').append('<div>No shipping costs found.</div>');
                    } else {
                        $.each(results, function(index, result) {
                            var html = '<h4 class="mt-5 mb-3">Layanan Pengembalian Produk:</h4><br><h5>' + result.name + '</h5>';

                            if (result.costs && result.costs.length > 0) {
                                $.each(result.costs, function(i, cost) {
                                    var formattedCost = 'N/A';
                                    if (cost.cost.length > 0) {
                                        formattedCost = 'Rp ' + cost.cost[0].value.toLocaleString('id-ID');
                                    }
                                    html += '<div class="form-check">';
                                    html += '<input class="form-check-input" type="radio" name="shipping_method" id="shipping_method" onchange="buttonOngkirModel(this)" value="' + cost.service + '">';
                                    html += '<input type="hidden" name="shipping_costs" id="shipping_costs' + cost.service + '" value="' + cost.cost[0].value + '" disabled>';
                                    html += '<div>' + cost.description + '</div>';
                                    html += '<div>Harga: ' + formattedCost + '</div>';
                                    html += '</div>';
                                    html += '<hr>';
                                });
                            } else {
                                html += '<div>No shipping costs found for this service.</div>';
                                html += '<hr>';
                            }

                            $('#results').html(html);
                        });
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endpush