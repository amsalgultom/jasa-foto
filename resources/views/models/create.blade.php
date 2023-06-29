@extends('layouts.app')
@section('title', 'ART SPACE - Models')

@section('content')

<!-- Begin Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Model</h2>
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

    <form action="{{ route('models.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Size:</strong>
                    <input type="text" name="size" class="form-control" placeholder="Size" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Tanggal Tersedia:</strong>
                    <input type="date" name="available_date" class="form-control" placeholder="Tanggal Tersedia" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Upload Gambar:</strong>
                    <input type="file" name="image" class="form-control" placeholder="Gambar" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center my-2">
                <a class="btn btn-secondary" href="{{ route('models.index') }}">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->
@endsection