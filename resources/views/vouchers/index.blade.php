@extends('layouts.app')
@section('title', 'ART SPACE - Vouchers')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Table Vouchers</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('vouchers.create') }}">Klik disini</a> untuk membuat voucher Baru</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered tabel-produk" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Voucher</th>
                            <th>Tipe</th>
                            <th>Nilai Diskon</th>
                            <th>Harga Maksimal Diskon:</th>
                            <th>Minimal Harga Order</th>
                            <th>Minimal Item Order</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode Voucher</th>
                            <th>Tipe</th>
                            <th>Nilai Diskon</th>
                            <th>Harga Maksimal Diskon:</th>
                            <th>Minimal Harga Order</th>
                            <th>Minimal Item Order</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($vouchers as $voucher)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $voucher->code_voucher }}</td>
                            <td>{{ $voucher->type }}</td>
                            @if($voucher->type == 'Percent')
                            <td>{{ $voucher->value_discount }} %</td>
                            @else
                            <td>{{ 'Rp '.number_format($voucher->value_discount, 0, ',', '.') }}</td>
                            @endif
                            <td>{{ 'Rp '.number_format($voucher->max_value_price_discount, 0, ',', '.') }}</td>
                            <td>{{ 'Rp '.number_format($voucher->min_price_order, 0, ',', '.') }}</td>
                            <td>{{ $voucher->min_product_order }} item</td>
                            <td>{{ $voucher->description }}</td>
                            <td>{{ $voucher->status }}</td>
                            <td>
                                <form action="{{ route('vouchers.destroy',$voucher->id) }}" method="POST">

                                    <!-- <a class="btn btn-info btn-circle btn-lg" href="{{ route('vouchers.show',$voucher->id) }}"><i class="fas fa-info-circle"></i></a> -->

                                    <a class="btn btn-warning btn-circle btn-lg" href="{{ route('vouchers.edit',$voucher->id) }}" title="Edit Voucher"><i class="fas fa-exclamation-triangle"></i></a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-circle btn-lg" title="Hapus Voucher"><i class="fas fa-trash"></i></button>
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