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
    <div id="multi-step-form-container ">
        <!-- Form Steps / Progress Bar -->
        <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0 d-mobile-none">
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
        <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
            @csrf
            <!-- Step 1 Content -->
            <section id="step-1" class="form-step">
                <div class="row multiple">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <h2 class="font-normal"  id="mdlFocus">Pilih Model</h2>
                            <div class="alert alert-danger d-none" id="validasiModel" role="alert">
                                Pilih salah satu model
                                <button id="closeValidasi" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="row my-2">
                                @foreach ($models as $model)
                                <div class="col-lg-3 col-md-4 col-6 mb-4">
                                    <div class="image-models">
                                        <img src="{{ asset('uploads-images/models/').'/'.$model->image }}" class="img-model" alt="{{ $model->name }}">
                                    </div>
                                    <h4 class="title-model mt-4"><a href="">{{ $model->name }}</a></h4>
                                    <p class="desc-model">Size : <span> {{ $model->size }}</span></p>
                                    <p class="tgl-model">Catalog Shoot</p>
                                    <p class="tgl-model">Tanggal tersedia : <span> {{ date('d-m-Y', strtotime($model->available_date ))}}</span></p>
                                    <div class="mx-auto">
                                        <input class="checkbox-model" type="checkbox" style="width:100%; height: 20px;" name="model_id[]" onclick="buttonPriceModel(this)" data-name="{{ $model->id }}" value="{{ $model->id }}" />
                                        <input type="hidden" name="name_model[]" id="nameModel{{ $model->id }}" value="{{ $model->name }}" disabled>
                                        <input type="hidden" name="available_date_model[]" id="available_dateModel{{ $model->id }}" value="{{ $model->available_date }}" disabled>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <h2 class="font-normal" id="bgFocus">Pilihan Foto Background Minggu ini</h2>
                            <div class="alert alert-danger d-none" id="validasiBackground" role="alert">
                                Pilih salah satu Foto Background
                                <button id="closeValidasibg" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="row my-2">
                                @foreach ($photobackgrounds as $pb)
                                <div class="col-lg-3 col-md-4 col-6 mb-4">
                                    <div class="image-models">
                                        <img src="{{ asset('uploads-images/photobackgrounds/').'/'.$pb->image }}" class="img-model" alt="{{ $pb->name }}">
                                    </div>
                                    <div class="mx-auto">
                                        <h4 class="title-model mt-4"><a href="">{{ $pb->name }}</a></h4>
                                        <input class="checkbox-background" type="radio" style="width:100%; height: 20px;" name="photobackground" onclick="buttonRadio(this)" id="photobackground" value="{{ $pb->id }}" />
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 text-right">
                        <button class="btn btn-primary btn-navigate-form-step" onclick="getProduct()" type="button" step_number="2">Next</button>
                    </div>
                </div>
            </section>
            <!-- Step 2 Content, default hidden on page load. -->
            <section id="step-2" class="form-step d-none">
                <h2 class="font-normal">Daftarkan Produk Anda</h2>
                <div class="alert alert-danger d-none" id="validasiProduk" role="alert">
                    Pilih salah satu produk
                    <button id="closeValidasiProd" type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Step 2 input fields -->
                <div class="row multiple">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <buuton id="buttunAddProduct" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>(+) Tambah Produk</buuton><br><br>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-5">
                                    <strong>Product</strong><br>
                                    <select name="product_id[]" id="select_prod_id1" class="form-control select-so w-100" required>
                                        <option value="" hidden>-- Pilih Product --</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <strong>Price:</strong>
                                        <input type="number" name="price_product[]" id="price_product1" class="form-control" required readonly>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-1">
                                    <div class="form-group">
                                        <strong>QTY:</strong>
                                        <input type="number" name="qty_product[]" id="qty_product1" class="form-control" min="1" value="1" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <strong>Sub Total:</strong>
                                        <input type="number" name="sub_total_product[]" id="sub_total_product1" class="form-control" required readonly>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Request</strong>
                                        <textarea class="form-control note" style="height:100px" id="note1" name="note_product[]" placeholder="Notes"></textarea>
                                        <label class="text-danger">*Harap produk yang dikirim sesuai</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-12 d-none">
                                    <div class="form-group">
                                        <input type="text" name="name_product[]" id="name_product1" class="form-control" required readonly>
                                        <input type="number" id="weight_product1" class="form-control" required readonly>
                                        <input type="number" name="sub_weight_product[]" id="sub_weight_product1" class="form-control" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div id="addProduct"></div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 my-3">
                                    <div class="form-group text-center">
                                        <strong>Upload Beberapa Gambar Untuk Referensi Foto Produk</strong><br>
                                        <input type="file" name="image_referensi_product[]" id="image_referensi_product1" multiple>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 text-right">
                    <a href="{{ route('order.service') }}" class="btn btn-secondary">Prev</a>
                    <button class="btn btn-primary btn-navigate-form-step" id="calculateSum" type="button" onclick="getProductOptional()" step_number="3">Next</button>
                </div>
            </section>
            <!-- Step 3 Content, default hidden on page load. -->
            <section id="step-3" class="form-step d-none">
                <h2 class="font-normal">Tambahan Lainnya jika diperlukan</h2>
                <!-- Step 3 input fields -->
                <div class="row multiple">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <buuton id="buttunAddOptional" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>(+) Tambah Our Service</buuton><br><br>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-5">
                                    <strong>Our Service</strong><br>
                                    <select name="product_id[]" id="select_prod_optional1" class="form-control select-so w-100">
                                        <option value="">-- Pilih Our Service --</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <strong>Price:</strong>
                                        <input type="number" name="price_product[]" id="price_product_optional1" class="form-control" required readonly>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-1">
                                    <div class="form-group">
                                        <strong>QTY:</strong>
                                        <input type="number" name="qty_product[]" id="qty_product_optional1" class="form-control" min="1" value="1" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <strong>Sub Total:</strong>
                                        <input type="number" name="sub_total_product[]" id="sub_total_product_optional1" class="form-control" required readonly>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Request</strong>
                                        <textarea class="form-control note" style="height:100px" id="note_optional1" name="note_product[]" placeholder="Notes"></textarea>
                                        <!-- <label class="text-danger">*Harap produk yang dikirim sesuai</label> -->
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-12 d-none">
                                    <div class="form-group">
                                        <input type="text" name="name_product[]" id="name_product_optional1" class="form-control" required readonly>
                                    </div>
                                </div>
                            </div><br>
                            <div id="addOptional"></div><br>
                            <div class="row">
                                <strong>Kode Voucher</strong>
                                <div class="col-xs-12 col-sm-12 col-md-5">
                                    <div class="form-group">
                                        <input type="text" name="code_voucher" id="code_voucher" placeholder="xxxxxx" class="form-control">
                                        <input type="hidden" name="this_voucher" id="this_voucher" value="0">
                                        <div id="info-voucher"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-5">
                                    <div class="form-group">
                                        <div class="btn btn-primary" id="check_voucher">Check Voucher</div>
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
                        <input type="hidden" name="weight" id="weight">
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
                            <textarea class="form-control" style="height:150px" name="address" placeholder="Jl. Raya Blok A. No51, Rt.001/01. Kel.Lorem, Kec.Lorem. Cipayung, Jakarta Timur" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div id="results"></div>
                                <div id="resultscod"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center my-5">
                        </div>
                    </div>
                    <div class="mt-3 text-right">
                        <button class="btn btn-secondary btn-navigate-form-step" type="button" step_number="3">Prev</button>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn btn-primary">Buat Order</button>
                    </div>
            </section>
        </form>
    </div>
</div>


</div>

@endsection

@push('scripts')
<script>
    var scriptjs = '';
    function buttonRadio(radio){
        var element = document.getElementById("validasiBackground");

        if (radio.checked) {
            element.classList.add('d-none');
        }
    }
    function buttonPriceModel(checkbox) {
        var hiddenInputName = document.getElementById("nameModel" + checkbox.value);
        var element = document.getElementById("validasiModel");

        var hiddenInputDate = document.getElementById("available_dateModel" + checkbox.value);
        if (checkbox.checked) {
            hiddenInputName.disabled = false;
            hiddenInputDate.disabled = false;
            element.classList.add('d-none');
        } else {
            hiddenInputName.disabled = true;
            hiddenInputDate.disabled = true;
        }

        var selectedModels = [];
        var checkboxes = document.getElementsByName('model_id[]');

        // Mendapatkan daftar model yang dipilih
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                selectedModels.push(checkboxes[i].getAttribute('data-name'));
            }
        }

        // Menampilkan opsi select yang sesuai dengan model yang dipilih
        var selectOptions = document.getElementById('select_prod_id1').options;

        for (var j = 0; j < selectOptions.length; j++) {
            var option = selectOptions[j];

            if (selectedModels.includes(option.getAttribute('class'))) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        }

        // Menampilkan opsi select yang sesuai dengan model yang dipilih
        var selectOptionsOptional = document.getElementById('select_prod_optional1').options;

        for (var j = 0; j < selectOptionsOptional.length; j++) {
            var option = selectOptionsOptional[j];

            if (selectedModels.includes(option.getAttribute('class'))) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        }

    }

    $("#select_prod_id1").change(function() {
        $("#name_product1").val($(this).find(':selected').data('nameprod'));
        $("#weight_product1").val($(this).find(':selected').data('weight'));
        $("#price_product1").val($(this).find(':selected').data('harga'));
        var total = $("#price_product1").val() * $("#qty_product1").val();
        $("#sub_total_product1").val(total);
        var totalweight = $("#weight_product1").val() * $("#qty_product1").val();
        $("#sub_weight_product1").val(totalweight);
        var element = document.getElementById("validasiProduk");
        element.classList.add('d-none');
    });
    $("#qty_product1").change(function() {
        var total = $("#price_product1").val() * $("#qty_product1").val();
        $("#sub_total_product1").val(total);
        var totalweight = $("#weight_product1").val() * $("#qty_product1").val();
        $("#sub_weight_product1").val(totalweight);
    });
    $("#select_prod_optional1").change(function() {
        $("#name_product_optional1").val($(this).find(':selected').data('nameprod'));
        $("#price_product_optional1").val($(this).find(':selected').data('harga'));
        var total = $("#price_product_optional1").val() * $("#qty_product_optional1").val();
        $("#sub_total_product_optional1").val(total);
    });
    $("#qty_product_optional1").change(function() {
        var total = $("#price_product_optional1").val() * $("#qty_product_optional1").val();
        $("#sub_total_product_optional1").val(total);
    });

    $("#closeValidasi").click(function() {
        var element = document.getElementById("validasiModel");
        element.classList.add('d-none');
    });
    $("#closeValidasiBg").click(function() {
        var element = document.getElementById("validasiBackground");
        element.classList.add('d-none');
    });
    $("#closeValidasiProd").click(function() {
        var element = document.getElementById("validasiProduk");
        element.classList.add('d-none');
    });

    $("#closeValidasi").click(function() {
        var element = document.getElementById("validasiModel");
        element.classList.add('d-none');
    });
    $("#closeValidasiProd").click(function() {
        var element = document.getElementById("validasiProduk");
        element.classList.add('d-none');
    });

    $(document).ready(function() {
        var i = 1;
        $("#buttunAddProduct").click(function() {
            i++;
            var datahtml1 = `
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-5">
                        <strong>Product</strong><br>
                        
                        <button class="btn btn-primary d-none" id="checkprod` + i + `" onclick="getProduct` + i + `()" >Check Product</button>
                        <select name="product_id[]" id="select_prod_id` + i + `" class="form-control select-so w-100">
                            <option value="" hidden>-- Pilih Product --</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group">
                            <strong>Price:</strong>
                            <input type="number" name="price_product[]" id="price_product` + i + `" class="form-control" required readonly>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-1">
                        <div class="form-group">
                            <strong>QTY:</strong>
                            <input type="number" name="qty_product[]" id="qty_product` + i + `" class="form-control" min="1" value="1" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="form-group">
                            <strong>Sub Total:</strong>
                            <input type="number" name="sub_total_product[]" id="sub_total_product` + i + `" class="form-control" required readonly>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Request</strong>
                            <textarea class="form-control" style="height:100px" id="note` + i + `" name="note_product[]" placeholder="Notes"></textarea>
                            <label class="text-danger">*Harap produk yang dikirim sesuai</label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-12 d-none">
                        <div class="form-group">
                            <input type="text" name="name_product[]" id="name_product` + i + `" class="form-control" required readonly>
                            <input type="number" id="weight_product` + i + `" class="form-control" required readonly>
                            <input type="number" name="sub_weight_product[]" id="sub_weight_product` + i + `" class="form-control" required readonly>
                        </div>
                    </div>
                </div>`
            $("#addProduct").append(datahtml1);
            var scrtipJS = `$("#select_prod_id` + i + `").change(function() {
                    $("#name_product` + i + `").val($(this).find(':selected').data('nameprod'));
                    $("#weight_product` + i + `").val($(this).find(':selected').data('weight'));
                    $("#price_product` + i + `").val($(this).find(':selected').data('harga'));
                    var total = $("#price_product` + i + `").val() * $("#qty_product` + i + `").val();
                    $("#sub_total_product` + i + `").val(total);
                    var totalweight = $("#weight_product` + i + `").val() * $("#qty_product` + i + `").val();
                    $("#sub_weight_product` + i + `").val(totalweight);
                });
                $("#qty_product` + i + `").change(function() {
                    var total = $("#price_product` + i + `").val() * $("#qty_product` + i + `").val();
                    $("#sub_total_product` + i + `").val(total);
                    var totalweight = $("#weight_product` + i + `").val() * $("#qty_product` + i + `").val();
                    $("#sub_weight_product` + i + `").val(totalweight);
                });
                
                $(document).ready(function() {
                var selectedModels = [];
                var checkboxesadd = document.getElementsByName('model_id[]');

                // Mendapatkan daftar model yang dipilih
                for (var i = 0; i < checkboxesadd.length; i++) {
                    if (checkboxesadd[i].checked) {
                        selectedModels.push(checkboxesadd[i].getAttribute('data-name'));
                    }
                }
                // Menampilkan opsi select yang sesuai dengan model yang dipilih
                var selectOptions = document.getElementById('select_prod_id` + i + `').options;

                for (var j = 0; j < selectOptions.length; j++) {
                    var option = selectOptions[j];
                        if (selectedModels.includes(option.getAttribute('class'))) {
                            option.style.display = 'block';
                        } else {
                            option.style.display = 'none';
                        }
                    }
                });
                function getProduct` + i + `() {
                    var selectedModels = [];
                    var checkboxes = document.getElementsByName('model_id[]');
                    var selectedRadio = document.querySelector('input[name="photobackground"]:checked');

                    // Mendapatkan daftar model yang dipilih
                    for (var i = 0; i < checkboxes.length; i++) {
                        if (checkboxes[i].checked) {
                            selectedModels.push(checkboxes[i].getAttribute('data-name'));
                        }
                    }
                    console.log(selectedRadio.value);
                $.ajax({
                    url: '/get-data-product?model_id='+selectedModels+'&photobackground='+selectedRadio.value,
                    type: 'GET',
                    success: function(response) {
                        
                        // Clear existing options
                        $('#select_prod_id` + i + `').empty();
                        var optionhidden = $('<option>', {
                                value: '',
                                text: '-- Pilih Product --',
                                'hidden':''
                            });
                        $('#select_prod_id` + i + `').append(optionhidden);
                        // Add new options based on response data
                        response.forEach(function(product) {
                            var option = $('<option>', {
                                value: product.id, // Assuming your product data has an 'id' property
                                text: 'Product '+product.name+', untuk model : '+product.mondelname,
                                'data-weight': product.weight,
                                'data-harga': product.price,
                                'data-nameprod': product.name
                            });
                            $('#select_prod_id` + i + `').append(option);
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
            $(document).ready(function() {
                $('#checkprod` + i + `').click();
            });
                `;
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.innerHTML = scrtipJS;
            $("#script-container").append(script);
        });
    });
    $(document).ready(function() {
        var i = 1;
        $("#buttunAddOptional").click(function() {
            i++;
            var datahtml2 = `
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <strong>Our Service</strong><br>
                    <button class="btn btn-primary d-none" id="checkprodoptional` + i + `" onclick="getProductOptional` + i + `()" >Check Product</button>
                    <select name="product_id[]" id="select_prod_optional` + i + `" class="form-control select-so w-100">
                        <option value="">-- Pilih Our Service --</option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="form-group">
                        <strong>Price:</strong>
                        <input type="number" name="price_product[]" id="price_product_optional` + i + `" class="form-control" required readonly>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-1">
                    <div class="form-group">
                        <strong>QTY:</strong>
                        <input type="number" name="qty_product[]" id="qty_product_optional` + i + `" class="form-control" min="1" value="1" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="form-group">
                        <strong>Sub Total:</strong>
                        <input type="number" name="sub_total_product[]" id="sub_total_product_optional` + i + `" class="form-control" required readonly>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Request</strong>
                        <textarea class="form-control note" style="height:100px" id="note_optional` + i + `" name="note_product[]" placeholder="Notes"></textarea>
                        <!-- <label class="text-danger">*Harap produk yang dikirim sesuai</label> -->
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-12 d-none">
                    <div class="form-group">
                        <input type="text" name="name_product[]" id="name_product_optional` + i + `" class="form-control" required readonly>
                    </div>
                </div>
            </div><br>`
            $("#addOptional").append(datahtml2);
            var scrtipJSS = `$(document).ready(function() {
                var selectedModels = [];
                var checkboxesadd = document.getElementsByName('model_id[]');

                // Mendapatkan daftar model yang dipilih
                for (var i = 0; i < checkboxesadd.length; i++) {
                    if (checkboxesadd[i].checked) {
                        selectedModels.push(checkboxesadd[i].getAttribute('data-name'));
                    }
                }
                var selectOptionsOptional = document.getElementById('select_prod_optional` + i + `').options;
                for (var j = 0; j < selectOptionsOptional.length; j++) {
                    var option = selectOptionsOptional[j];

                    if (selectedModels.includes(option.getAttribute('class'))) {
                        option.style.display = 'block';
                    } else {
                        option.style.display = 'none';
                    }
                }
                $("#select_prod_optional` + i + `").change(function() {
                    $("#name_product_optional` + i + `").val($(this).find(':selected').data('nameprod'));
                    $("#price_product_optional` + i + `").val($(this).find(':selected').data('harga'));
                    var total = $("#price_product_optional` + i + `").val() * $("#qty_product_optional` + i + `").val();
                    $("#sub_total_product_optional` + i + `").val(total);
                });
                $("#qty_product_optional` + i + `").change(function() {
                    var total = $("#price_product_optional` + i + `").val() * $("#qty_product_optional` + i + `").val();
                    $("#sub_total_product_optional` + i + `").val(total);
                });
                });
                function getProductOptional` + i + `() {
                    var selectedModels = [];
                    var checkboxes = document.getElementsByName('model_id[]');
                    var selectedRadio = document.querySelector('input[name="photobackground"]:checked');

                    // Mendapatkan daftar model yang dipilih
                    for (var i = 0; i < checkboxes.length; i++) {
                        if (checkboxes[i].checked) {
                            selectedModels.push(checkboxes[i].getAttribute('data-name'));
                        }
                    }
                    console.log(selectedRadio.value);
                $.ajax({
                    url: '/get-data-product-optional?model_id='+selectedModels+'&photobackground='+selectedRadio.value,
                    type: 'GET',
                    success: function(response) {
                        
                        // Clear existing options
                        $('#select_prod_optional` + i + `').empty();
                        var optionhidden = $('<option>', {
                                value: '',
                                text: '-- Pilih Product --',
                                'hidden':''
                            });
                        $('#select_prod_optional` + i + `').append(optionhidden);
                        // Add new options based on response data
                        response.forEach(function(product) {
                            var option = $('<option>', {
                                value: product.id, // Assuming your product data has an 'id' property
                                text: 'Product '+product.name+', untuk model : '+product.mondelname,
                                'data-weight': product.weight,
                                'data-harga': product.price,
                                'data-nameprod': product.name
                            });
                            $('#select_prod_optional` + i + `').append(option);
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
            $(document).ready(function() {
                $('#checkprodoptional` + i + `').click();
            });
                `;
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.innerHTML = scrtipJSS;
            $("#script-container").append(script);
        });
    });

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
    // JavaScript/jQuery
    $(document).ready(function() {
        $("#calculateSum").click(function() {
            var sum = 0;
            $('input[name="sub_weight_product[]"]').each(function() {
                var value = parseFloat($(this).val());
                if (!isNaN(value)) {
                    sum += value;
                }
            });
            $("#weight").val(sum);
            console.log(sum)
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
                                    html += '<input class="form-check-input" type="radio" required name="shipping_method" id="shipping_method" onchange="buttonOngkirModel(this)" value="' + cost.service + '">';
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
                        var htmlcod = '';
                        htmlcod += '<div class="form-check">';
                        htmlcod += '<input class="form-check-input" type="radio" name="shipping_method" id="shipping_method" value="COD">';
                        htmlcod += '<div>COD (Bayar di Tempat)</div>';
                        htmlcod += '<div><b>*Disarankan</div>';
                        htmlcod += '</div>';
                        $('#resultscod').html(htmlcod);
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

            var checkBoxes = document.getElementsByClassName('checkbox-model');
            var radioBoxes = document.getElementsByClassName('checkbox-background');
            var nbChecked = 0;
            var nbRadio = 0;
            var element = document.getElementById("validasiModel");
            var element1 = document.getElementById("validasiBackground");
            var prodAlert = document.getElementById("validasiProduk");
            var product = document.getElementById('select_prod_id1').value;
            var note = document.getElementById('note1').value;
            const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));

            for (var i = 0; i < checkBoxes.length; i++) {
                if (checkBoxes[i].checked) {
                    nbChecked++;
                };
            };

            for (var x = 0; x < radioBoxes.length; x++) {
                if (radioBoxes[x].checked) {
                    nbRadio++;
                };
            };
            if (stepNumber == 2) {
                if (nbChecked == 0) {
                    element.classList.remove("d-none");
                    $('html, body').animate({scrollTop: $("#mdlFocus").offset().top}, 1000);
                    return false;
                }
                else if (nbRadio == 0) {
                    element1.classList.remove("d-none");
                    $('html, body').animate({scrollTop: $("#bgFocus").offset().top}, 500);
                    return false;
                } 
                else {
                    navigateToFormStep(stepNumber);
                }
            }
            if (stepNumber == 3) {
                if (product === "") {
                    prodAlert.classList.remove("d-none");
                    return false;
                } else {
                    navigateToFormStep(stepNumber);
                }
            } else {
                navigateToFormStep(stepNumber);
            }

        });
    });

    function getCSRFToken() {
        return $('meta[name="csrf-token"]').attr('content');
    }

    $(document).ready(function() {
        $('#check_voucher').on('click', function() {

            var qtyproduct = 0;
            $('input[name="qty_product[]"]').each(function() {
                var value = parseFloat($(this).val());
                if (!isNaN(value)) {
                    qtyproduct += value;
                }
            })
            console.log(qtyproduct)

            var incModel = [];
            incModel.push(0);
            $('input[name="model_id[]"]:checked').each(function() {
                incModel.push($(this).val());
            });
            
            console.log(incModel)

            var totalPrive = 0;
            $('input[name="sub_total_product[]"]').each(function() {
                var value = parseFloat($(this).val());
                if (!isNaN(value)) {
                    totalPrive += value;
                }
            })
            console.log(totalPrive)
            // Get the entered voucher code
            var voucherCode = $('#code_voucher').val().trim();

            // Send an AJAX request to validate the voucher code
            $.ajax({
                url: '/check-voucher', // Replace with your actual API endpoint URL
                type: 'POST',
                data: {
                    voucher_code: voucherCode,
                    total_price_order: totalPrive,
                    total_price_product: qtyproduct,
                    include_model: incModel,
                },
                headers: {
                    'X-CSRF-TOKEN': getCSRFToken() // Include the CSRF token in the request headers
                },
                success: function(response) {
                    if (response.valid) {
                        $('#info-voucher').html('<span class="text-success h6">Voucher berhasil digunakan</span>');
                        $('#this_voucher').val(1)
                    } else {
                        $('#info-voucher').html('<span class="text-danger h6">Kode Voucher tidak sesuai, tidak dapat digunakan</span>');
                        $('#this_voucher').val(0)
                    }
                },
                error: function() {
                    alert('Error occurred while checking the voucher. Please try again later.');
                }
            });
        });
    });

    function getProduct() {
        var selectedModels = [];
        var checkboxes = document.getElementsByName('model_id[]');
        var selectedRadio = document.querySelector('input[name="photobackground"]:checked');

        // Mendapatkan daftar model yang dipilih
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                selectedModels.push(checkboxes[i].getAttribute('data-name'));
            }
        }
        console.log(selectedRadio.value);
    $.ajax({
        url: '/get-data-product?model_id='+selectedModels+'&photobackground='+selectedRadio.value,
        type: 'GET',
        success: function(response) {
            console.log(response)
            if (response.length != 0){
                $('#select_prod_id1').empty();
                var optionhidden = $('<option>', {
                        value: '',
                        text: '-- Pilih Product --',
                        'hidden':''
                    });
                $('#select_prod_id1').append(optionhidden);
                // Add new options based on response data
                response.forEach(function(product) {
                    var option = $('<option>', {
                        value: product.id, // Assuming your product data has an 'id' property
                        text: 'Product '+product.name+', untuk model : '+product.mondelname, 
                        'data-weight': product.weight,
                        'data-harga': product.price,
                        'data-nameprod': product.name
                    });
                    $('#select_prod_id1').append(option);
                });
            }else{
                $('#select_prod_id1').empty();
                var optionhidden = $('<option>', {
                        value: '',
                        text: '-- Product tidak tersedia, silahkan pilih model lain --',
                    });
                    
                $('#select_prod_id1').append(optionhidden);
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}
    function getProductOptional() {
        var selectedModels = [];
        var checkboxes = document.getElementsByName('model_id[]');
        var selectedRadio = document.querySelector('input[name="photobackground"]:checked');

        // Mendapatkan daftar model yang dipilih
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                selectedModels.push(checkboxes[i].getAttribute('data-name'));
            }
        }
        console.log(selectedRadio.value);
    $.ajax({
        url: '/get-data-product-optional?model_id='+selectedModels+'&photobackground='+selectedRadio.value,
        type: 'GET',
        success: function(response) {
            
            if (response.length != 0){
            // Clear existing options
            $('#select_prod_optional1').empty();
            var optionhidden = $('<option>', {
                    value: '',
                    text: '-- Pilih Product --',
                    'hidden':''
                });
            $('#select_prod_optional1').append(optionhidden);
            // Add new options based on response data
            response.forEach(function(product) {
                var option = $('<option>', {
                    value: product.id, // Assuming your product data has an 'id' property
                    text: 'Product '+product.name+', untuk model : '+product.mondelname,
                    'data-weight': product.weight,
                    'data-harga': product.price,
                    'data-nameprod': product.name
                });
                $('#select_prod_optional1').append(option);
            });
        }else{
            $('#select_prod_optional1').empty();
                var optionhidden = $('<option>', {
                        value: '',
                        text: '-- Product optional tidak tersedia --',
                    });
                    
                $('#select_prod_optional1').append(optionhidden);
        }
        },
        error: function(error) {
            console.log(error);
        }
    });
}
</script>
@endpush