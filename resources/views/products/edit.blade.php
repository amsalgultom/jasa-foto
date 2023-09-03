@extends('layouts.app')
@section('title', 'ART SPACE - Products')

@section('content')
<!-- Begin Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
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

    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group">
                    <strong>Model:</strong>
                    <select class="form-control w-100 select-form" name="model_id" required>
                        <option value="" hidden selected>-- Pilih Model --</option>
                        @foreach ($models as $model)
                        <option value="{{$model->id}}" @if($model->id == $product->model_id) selected @endif>{{$model->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group">
                    <strong>Tipe:</strong>
                    <select class="form-control w-100 select-product" name="type" required>
                        <option value="Produk Utama" {{ $product->type == 'Produk Utama' ? 'selected' : '' }}>Produk Utama</option>
                        <option value="Our Service" {{ $product->type == 'Our Service' ? 'selected' : '' }}>Our Service</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group">
                    <strong>Background:</strong>
                    <select class="form-control w-100 select-form" name="photobackground_id" required>
                        <option value="" hidden selected>-- Pilih Background --</option>
                        @foreach ($photobackgrounds as $pb)
                        <option value="{{$pb->id}}" @if($pb->id == $product->photobackground_id) selected @endif>{{$pb->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group">
                    <strong>Harga:</strong>
                    <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group">
                    <strong>Berat (gram):</strong>
                    <input type="number" name="weight" class="form-control" value="{{ $product->weight }}" required>
                </div>
            </div>
            <!-- <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group">
                    <strong>Upload Gambar:</strong><br>
                    @if ($product->image !== null)
                    <img src="{{ asset('uploads-images/products/').'/'.$product->image }}" alt="{{ $product->name }}" width="100" class="mb-2">
                    @endif
                    <input type="file" name="image" class="form-control" placeholder="Gambar">
                </div>
            </div> -->
            <div class="col-xs-12 col-sm-12 col-md-12 text-center my-2">
                <a class="btn btn-secondary" href="{{ route('products.index') }}">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>
@endsection