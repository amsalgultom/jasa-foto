@extends('layouts.app')
@section('title', 'ART SPACE - Order')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Order Client</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered tabel-order tabel-list" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>Tanggal</th>
                            <th>Harga Pengiriman</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>Tanggal</th>
                            <th>Harga Pengiriman</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($myorders as $myorder)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $myorder->customer?->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($myorder->date)->format('d-m-Y') }}</td>
                            <td>{{ $myorder->shipping_method . ' Rp '.number_format($myorder->shipping_costs, 0, ',', '.') }}</td>
                            <td>{{ 'Rp '.number_format($myorder->total, 0, ',', '.') }}</td>
                            <td>{{ $myorder->status?->name }}</td>
                            <td>
                                <a href="{{ route('myorders.show',$myorder->id) }}" class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-info-circle"></i>
                                    </span>
                                    <span class="text">Detail Order</span>
                                </a> <br>
                                
                                @if ($myorder->status?->name != 'UnPaid')
                                <a href="{{ route('orderupload.show',$myorder->id) }}" class="btn btn-secondary btn-icon-split mt-2">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                    <span class="text">Upload Foto</span>
                                </a>
                                @endif

                                @if($myorder->status?->name == 'Product Returned')
                                <a href="{{ route('admin.print-shipping',$myorder->id) }}" class="btn btn-secondary btn-icon-split mt-2">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-print"></i>
                                    </span>
                                    <span class="text">Print Resi</span>
                                </a>
                                @endif
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