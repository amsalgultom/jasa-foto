@extends('layouts.app')
@section('title', 'ART SPACE - Models')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Table Models</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="/models/create">Klik disini</a> untuk membuat model Baru</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Size</th>
                            <th>Tanggal Tersedia</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Size</th>
                            <th>Tanggal Tersedia</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($models as $model)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $model->name }}</td>
                            <td>{{ $model->size }}</td>
                            <td>{{ $model->available_date }}</td>
                            <td class="text-center"><img src="{{ asset('uploads-images/models/').'/'.$model->image }}" alt="{{ $model->name }}" width="100"></td>
                            <td>
                                <form action="{{ route('models.destroy',$model->id) }}" method="POST">

                                    <a class="btn btn-info btn-circle btn-lg" href="{{ route('models.show',$model->id) }}"><i class="fas fa-info-circle"></i></a>

                                    <a class="btn btn-warning btn-circle btn-lg" href="{{ route('models.edit',$model->id) }}"><i class="fas fa-exclamation-triangle"></i></a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-circle btn-lg"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->
@endsection