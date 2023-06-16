@extends('layout-users.app')
@section('title', 'ArtSpace Photoshoot')

@section('content')

<main id="main">
    <section><br><br>
        <div class="text-center my-5">
            <h1>List Order Saya </h1>
        </div>

        <!-- Begin Page Content -->
        <div class="container my-5">
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
            <!-- Begin Page Content -->
            <div class="container-fluid">


                <!-- DataTales Example -->
                <div class="card shadow">
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

                                            <div class="">
                                                <a class="btn btn-info btn-icon-split mb-2" href="{{ route('myorderservices.show',$myorder->id) }}"><span class="icon text-white-50">
                                                        <i class="fas fa-arrow-right"></i>
                                                    </span>
                                                    <span class="text">Detail Order</span></a>
                                                @if($myorder->status?->name == 'UnPaid')
                                                <form action="{{ route('myorderservices.payment') }}" method="POST">
                                                    @csrf

                                                    <input type="hidden" name="order_id" value="{{ $myorder->id }}">
                                                    <input type="hidden" name="gross_amount" value="{{ $myorder->total }}">
                                                    <input type="hidden" name="first_name" value="{{ $myorder->customer?->name }}">
                                                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                                    <input type="hidden" name="phone" value="{{ $myorder->customer?->phone }}">
                                                    <button type="submit" class="btn btn-warning btn-icon-split"><span class="icon text-white-50">
                                                            <i class="fas fa-arrow-right"></i>
                                                        </span>
                                                        <span class="text">Bayar Sekarang</span></i></button>
                                                </form>
                                                @elseif($myorder->status?->name == 'Uploaded Image')
                                            </div>
                                            <a href="{{ route('myorderservices.result',$myorder->id) }}" class="btn btn-secondary btn-icon-split mt-2">
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
            <br><br><br>
        </div>
    </section>
</main>
<!-- /.container-fluid -->

@endsection