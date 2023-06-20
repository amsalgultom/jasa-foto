@extends('layout-users.app')
@section('title', 'ArtSpace Photoshoot')

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

    <div class="text-center">
        <h1 class="brown title-order">Form Pemesanan Jasa Foto</h1>
    </div>
    <div id="multi-step-form-container">
        <!-- Form Steps / Progress Bar -->
        <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
            <!-- Step 1 -->
            <li class="form-stepper-active text-center form-stepper-list" step="1">
                <a class="mx-2">
                    <span class="form-stepper-circle">
                        <span>1</span>
                    </span>
                    <div class="label">Pilih Model</div>
                </a>
            </li>
            <!-- Step 2 -->
            <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                <a class="mx-2">
                    <span class="form-stepper-circle text-muted">
                        <span>2</span>
                    </span>
                    <div class="label text-muted">Daftarkan Produk Anda</div>
                </a>
            </li>
            <!-- Step 3 -->
            <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                <a class="mx-2">
                    <span class="form-stepper-circle text-muted">
                        <span>3</span>
                    </span>
                    <div class="label text-muted">Tambahan Lainnya (Opsional)</div>
                </a>
            </li>
            <li class="form-stepper-unfinished text-center form-stepper-list" step="4">
                <a class="mx-2">
                    <span class="form-stepper-circle text-muted">
                        <span>4</span>
                    </span>
                    <div class="label text-muted">Isi Data Diri</div>
                </a>
            </li>
        </ul>
        <!-- Step Wise Form Content -->
        <form action="{{ route('orders.store') }}" method="POST" class="mb-5">
        @csrf
            <!-- Step 1 Content -->
            <section id="step-1" class="form-step">
                <div class="row multiple">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <h2 class="font-normal">Pilih Model</h2>

                            <div class="row my-2">
                            @foreach ($models as $model)
                                <div class="col-lg-3 col-md-4 col-6 mb-4">
                                    <div class="image-models">
                                        <img src="{{ asset('uploads-images/models/').'/'.$model->image }}" class="img-model" alt="{{ $model->name }}">
                                    </div>
                                    <h4 class="title-model mt-4"><a href="">{{ $model->name }}</a></h4>
                                    <p class="desc-model">{{ 'Rp '.number_format($model->price, 0, ',', '.') }}</p>
                                    <p class="tgl-model">Tanggal tersedia : <span> {{ $model->available_date }}</span></p>
                                    <div class="mx-auto">
                                        <input type="checkbox" style="width:100%; height: 20px;" name="model[]" onclick="buttonPriceModel(this)" value="{{ $model->id }}" />
                                        <input type="hidden" name="price_model[]" id="priceModel{{ $model->id }}" value="{{ $model->price }}" disabled>
                                        <input type="hidden" name="name_model[]" id="nameModel{{ $model->id }}" value="{{ $model->name }}" disabled>
                                        <input type="hidden" name="available_date_model[]" id="available_dateModel{{ $model->id }}" value="{{ $model->available_date }}" disabled>
                                    </div>
                                </div>

                                <!-- <div class="col-md-10">
                                    <div class="d-flex align-items-center" style="justify-content: space-evenly;">
                                        <p>Nama : <br> {{ $model->name }}</p>
                                        <img src="{{ asset('uploads-images/models/').'/'.$model->image }}" alt="{{ $model->name }}" width="200">
                                        <p>Tanggal tersedia : <br> {{ $model->available_date }}</p>
                                    </div>
                                </div> -->
                                <!-- <div class="col-md-2 m-auto">
                                    <input type="checkbox" style="width:100%;height: 30px;" name="model[]" onclick="buttonPriceModel(this)" value="{{ $model->id }}" />
                                    <input type="hidden" name="price_model[]" id="priceModel{{ $model->id }}" value="{{ $model->price }}" disabled>
                                    <input type="hidden" name="name_model[]" id="nameModel{{ $model->id }}" value="{{ $model->name }}" disabled>
                                    <input type="hidden" name="available_date_model[]" id="available_dateModel{{ $model->id }}" value="{{ $model->available_date }}" disabled>
                                </div> -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 text-right">
                        <button class="btn btn-primary btn-navigate-form-step" type="button" step_number="2" onclick="checkValue1()">Next</button>
                    </div>
                </div>
            </section>
            <!-- Step 2 Content, default hidden on page load. -->
            <section id="step-2" class="form-step d-none">
                <h2 class="font-normal">Daftarkan Produk Anda</h2>
                <!-- Step 2 input fields -->
                <div class="row multiple">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">

                            <buuton id="buttunAddProduct" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>(+) Tambah Produk</buuton><br><br>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <strong>Product</strong><br>
                                    <select name="product_id[]" id="prod" class="form-control select-so w-100" required>
                                        <option value="" hidden>-- Pilih Product --</option>
                                        @foreach ($products as $prod)
                                        <option value="{{$prod->id}}" data-weight="{{$prod->weight}}">{{$prod->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8">
                                    <div class="form-group">
                                        <strong>Catatan</strong>
                                        <textarea class="form-control" style="height:100px" id="note" name="note[]" placeholder="Notes"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div id="addProduct"></div>
                            <input type="hidden" name="weight" id="weight" value="" required>

                        </div>
                    </div>
                </div>
                <div class="mt-3 text-right">
                    <button class="btn btn-secondary btn-navigate-form-step" type="button" step_number="1">Prev</button>
                    <button class="btn btn-primary btn-navigate-form-step" type="button" onclick="checkValue1()" step_number="3">Next</button>
                </div>
            </section>
            <!-- Step 3 Content, default hidden on page load. -->
            <section id="step-3" class="form-step d-none">
                <h2 class="font-normal">Tambahan Lainnya jika diperlukan</h2>
                <!-- Step 3 input fields -->
                <div class="row multiple">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
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
                <div class="mt-3 text-right">
                    <button class="btn btn-secondary btn-navigate-form-step" type="button" step_number="2">Prev</button>
                    <button class="btn btn-primary btn-navigate-form-step" type="button" step_number="4">Next</button>
                </div>
            </section>

            <!-- Step 4 Content, default hidden on page load. -->
            <section id="step-4" class="form-step d-none">
                <h2 class="font-normal">Isi Data Diri</h2>
                <!-- Step 4 input fields -->
                <div class="row multiple">
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
                    <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div id="results"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center my-5">
                    </div>
                </div>
                <div class="mt-3 text-right">
                    <button class="btn btn-secondary btn-navigate-form-step" type="button" step_number="2">Prev</button>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-primary">Buat Order</button>
                </div>
            </section>
        </form>
    </div>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        
        
        
       
       
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
                        <strong>Catatan</strong>
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

      /**
   * Form Multi Step
   */

    const navigateToFormStep = (stepNumber) => {
      
        document.querySelectorAll(".form-step").forEach((formStepElement) => {
            formStepElement.classList.add("d-none");
        });
       
        document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
            formStepHeader.classList.add("form-stepper-unfinished");
            formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
        });
     
        document.querySelector("#step-" + stepNumber).classList.remove("d-none");
        
        const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
        
        formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
        formStepCircle.classList.add("form-stepper-active");
        
        for (let index = 0; index < stepNumber; index++) {
           
            const formStepCircle = document.querySelector('li[step="' + index + '"]');
            
            if (formStepCircle) {
                
                formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
                formStepCircle.classList.add("form-stepper-completed");
            }
        }
    };

    document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {  
        formNavigationBtn.addEventListener("click", () => { 
            const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number")); 
            navigateToFormStep(stepNumber);
        });
    });
    
    function checkValue1() {
    	var name = document.getElementById("prod");
        if(name.value === "") {
          var att = document.createAttribute("required");
          name.setAttributeNode(att);
        }
    }
</script>
@endpush