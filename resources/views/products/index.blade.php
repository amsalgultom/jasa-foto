@extends('layouts.app')
@section('title', 'ART SPACE - Products')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Table Products</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="/products/create">Klik disini</a> untuk membuat Product Baru</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Model</th>
                            <th>Nama Produk</th>
                            <th>Tipe</th>
                            <th>Harga</th>
                            <th>Berat (gram)</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Model</th>
                            <th>Nama Produk</th>
                            <th>Tipe</th>
                            <th>Harga</th>
                            <th>Berat (gram)</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $product->mondelname }}</td>
                            <td>{{ $product->prodname }}</td>
                            <td>{{ $product->type }}</td>
                            <td>{{ 'Rp '.number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->weight }}(g)</td>
                            <td class="text-center">
                                @if ($product->prodimage !== null)
                                <img src="{{ asset('uploads-images/products/').'/'.$product->prodimage }}" alt="{{ $product->prodname }}" width="100">
                                @else
                                Gambar tidak tersedia
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                                    <a class="btn btn-info btn-circle btn-lg" href="{{ route('products.show',$product->id) }}"><i class="fas fa-info-circle"></i></a>

                                    <a class="btn btn-warning btn-circle btn-lg" href="{{ route('products.edit',$product->id) }}"><i class="fas fa-exclamation-triangle"></i></a>

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