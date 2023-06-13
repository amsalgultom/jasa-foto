@extends('layouts.app')
@section('title', 'Jasa Foto - Setting Jasa Foto')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Setting Jasa Foto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/"> Back</a>
            </div>
        </div>
    </div>
   
    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
   @csrf
        <div class="row my-4">
            <h4 class="pl-2">Setting Company</h4>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $company->name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="email" value="{{ $company->email }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>No Telp:</strong>
                    <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ $company->phone }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat:</strong>
                    <textarea class="form-control" style="height:150px" name="address" placeholder="Alamat">{{ $company->address }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <img src="/uploads/company/{{ $company->image }}" width="100px" class="mb-2">
                    <input type="file" name="image" class="form-control" placeholder="image">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
</div>
@endsection