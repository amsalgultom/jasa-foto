@extends('layouts.app')
@section('title', 'ART SPACE - Vouchers')

@push('heads')
<!-- <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" /> -->
@endpush

@section('content')

<!-- Begin Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
        </div>
    </div>
    <br>
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

    <form action="{{ route('vouchers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Kode Voucher:</strong>
                    <input type="text" name="code_voucher" class="form-control" placeholder="code_voucher" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Tipe:</strong>
                    <select class="form-control w-100 select-form" name="type" required>
                        <option value="" hidden selected>-- Pilih Tipe --</option>
                        <option value="Percent">Percent</option>
                        <option value="Fixed">Fixed</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Nilai Diskon:</strong>
                    <input type="number" name="value_discount" class="form-control" placeholder="Nilai Diskon" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Harga Maksimal Diskon:</strong>
                    <input type="number" name="max_value_price_discount" class="form-control" placeholder="Nilai Maksimal Diskon" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Minimal Price Order:</strong>
                    <input type="number" name="min_price_order" class="form-control" placeholder="Minimal Price Order" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Minimal Product Order:</strong>
                    <input type="number" name="min_product_order" class="form-control" placeholder="Minimal Price Order" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Promotion For Model:</strong>
                    <!-- <select data-placeholder="Ketik untuk mencari model..." class="chosen-select form-control" name="include_model"> -->
                    <select class="form-control" name="include_model" required>
                        <option value="0" selected>-- Semua Model --</option>
                        @foreach($models as $model)
                        <option value="{{$model->id}}">{{$model->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="form-group">
                    <strong>Deskripsi Voucher:</strong>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select class="form-control w-100 select-form" name="status" required>
                        <option value="" hidden selected>-- Pilih Status --</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center my-2">
                <a class="btn btn-secondary" href="{{ route('vouchers.index') }}">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->
@endsection

@push('scripts')

<!-- <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>

<script>
    $(".chosen-select").chosen({
        no_results_text: "Oops, nothing found!"
    })
</script> -->
@endpush