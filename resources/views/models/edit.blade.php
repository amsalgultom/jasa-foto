@extends('layouts.app')
@section('title', 'ART SPACE - Models')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit model</h2>
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
  
    <form action="{{ route('models.update',$model->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" value="{{ $model->name }}" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group">
                    <strong>Harga:</strong>
                    <input type="number" name="price" class="form-control" value="{{ $model->price }}" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group">
                    <strong>Tanggal Tersedia:</strong>
                    <input type="date" name="available_date" class="form-control" value="{{ $model->available_date }}" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="form-group">
                    <strong>Upload Gambar:</strong><br>
                    <img src="{{ asset('uploads-images/models/').'/'.$model->image }}" alt="{{ $model->name }}" width="100" class="mb-2">
                    <input type="file" name="image" class="form-control" placeholder="Gambar">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center my-2">
                <a class="btn btn-secondary" href="{{ route('models.index') }}">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
</div>
@endsection