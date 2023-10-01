@extends('layouts.app')
@section('title', 'ART SPACE - Vouchers')

@section('content')
<!-- Begin Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Vouchers</h2>
            </div>
        </div>
    </div>

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

    <form action="{{ route('vouchers.update',$voucher->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Kode Voucher:</strong>
                    <input type="text" name="code_voucher" class="form-control" placeholder="code_voucher" value="{{ $voucher->code_voucher }}" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Tipe:</strong>
                    <select class="form-control w-100 select-form" name="type" required>
                        <option value="" hidden selected>-- Pilih Tipe --</option>
                        <option value="Percent" {{ $voucher->type == 'Percent' ? 'selected' : '' }}>Percent</option>
                        <option value="Fixed" {{ $voucher->type == 'Fixed' ? 'selected' : '' }}>Fixed</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Nilai Diskon:</strong>
                    <input type="number" name="value_discount" class="form-control" placeholder="Nilai Diskon"  value="{{ $voucher->value_discount }}" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Harga Maksimal Diskon:</strong>
                    <input type="number" name="max_value_price_discount" class="form-control" placeholder="Nilai Maksimal Diskon"  value="{{ $voucher->max_value_price_discount }}" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Minimal Price Order:</strong>
                    <input type="number" name="min_price_order" class="form-control" placeholder="Minimal Price Order"  value="{{ $voucher->min_price_order }}" required>
                </div>
                <div class="form-group">
                    <strong>Minimal Product Order:</strong>
                    <input type="number" name="min_product_order" class="form-control" placeholder="Minimal Price Order"  value="{{ $voucher->min_product_order }}" required>
                </div>
                <div class="form-group">
                    <strong>Promotion For Model:</strong>
                    <!-- <select data-placeholder="Ketik untuk mencari model..." class="chosen-select form-control" name="include_model"> -->
                    <select class="form-control" name="include_model" required>
                        <option value="0" selected>-- Semua Model --</option>
                        @foreach($models as $model)
                        <option value="{{$model->id}}" {{ $voucher->include_model == $model->id ? 'selected' : '' }}>{{$model->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <strong>Status:</strong>
                    <select class="form-control w-100 select-form" name="status" required>
                        <option value="" hidden selected>-- Pilih Status --</option>
                        <option value="Aktif" {{ $voucher->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Tidak Aktif" {{ $voucher->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Deskripsi Voucher:</strong>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ $voucher->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center my-2">
                <a class="btn btn-secondary" href="{{ route('vouchers.index') }}">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection