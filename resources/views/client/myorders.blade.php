@extends('layouts.app')
@section('title', 'ART SPACE - Order')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Order Saya</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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

                                <div class="d-flex">
                                    <a class="btn btn-info btn-circle btn-lg" href="{{ route('myorders.show',$myorder->id) }}"><i class="fas fa-info-circle"></i></a>
                                    @if($myorder->status?->name == 'UnPaid')
                                <form action="{{ route('myorders.payment') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="order_id" value="{{ $myorder->id }}">
                                    <input type="hidden" name="gross_amount" value="{{ $myorder->total }}">
                                    <input type="hidden" name="first_name" value="{{ $myorder->customer?->name }}">
                                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                    <input type="hidden" name="phone" value="{{ $myorder->customer?->phone }}">
                                    <button type="submit" class="btn btn-warning btn-circle btn-lg"><i class="fa fa-credit-card"></i></button>
                                </form>
                                @elseif($myorder->status?->name == 'Uploaded Image')
                            </div>
                                <a href="{{ route('myorders.result',$myorder->id) }}" class="btn btn-secondary btn-icon-split mt-2">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                    <span class="text">Cek Hasil Foto</span>
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