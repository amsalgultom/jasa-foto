@extends('layouts.app')
@section('title', 'ART SPACE - Photo Backgrounds')

@section('content')
<!-- Begin Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Photo Background</h2>
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

    <form action="{{ route('photobackgrounds.update',$photobackground->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" value="{{ $photobackground->name }}" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select class="form-control w-100 select-form" name="status" required>
                        <option value="" hidden selected>-- Pilih Status --</option>
                        <option value="Aktif" {{ $photobackground->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Tidak Aktif" {{ $photobackground->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Upload Gambar:</strong><br>
                    <img src="{{ asset('uploads-images/photobackgrounds/').'/'.$photobackground->image }}" alt="{{ $photobackground->name }}" width="100" class="mb-2">
                    <input type="file" name="image" class="form-control" placeholder="Gambar">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center my-2">
                <a class="btn btn-secondary" href="{{ route('photobackgrounds.index') }}">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>
@endsection