@extends('layouts.app')
@section('title', 'ART SPACE - Products')

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

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group">
                    <strong>Tipe:</strong>
                    <select class="form-control w-100 select-form" name="type" required>
                        <option value="" hidden selected>-- Pilih Tipe --</option>
                        <option value="Produk Utama">Produk Utama</option>
                        <option value="Aksesoris Sepatu">Aksesoris Sepatu</option>
                        <option value="Model Kerudung">Model Kerudung</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group">
                    <strong>Harga:</strong>
                    <input type="number" name="price" class="form-control" placeholder="Harga">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group">
                    <strong>Berat (gram):</strong>
                    <input type="number" name="weight" class="form-control" placeholder="Berat (gram)">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group">
                    <strong>Upload Gambar:</strong>
                    <input type="file" name="image" class="form-control" placeholder="Gambar">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center my-2">
                <a class="btn btn-secondary" href="{{ route('products.index') }}">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->
@endsection