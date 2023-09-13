@extends('layout-users.app')
@section('title', 'ArtSpace Photoshoot')

@section('content')


<main id="main">
    
    <section id="recent-photos" class="recent-photos mt-4">
        <div class="container">

            <div class="section-title brown">
                <h2 class="brown">Procedure</h2>
                <div class="w-75 mx-auto">
                    <p>Sebuah konsep foto standar yang menunjukan visual produk tersebut dari tampak depan, samping, belakang dan detail yang konsep fotonya sudah ditentukan oleh team ArtSpace.</p>
                </div>
            </div>
            <div class="row row-procedure">
                <div class="prosedur">
                    <div class="step-procedure col-md-12">
                            <img src="{{ asset('img/procedure/cek-jadwal.png')}}" class="img-procedure">
                            <h2 class="title-procedure">Cek Jadwal</h2>
                            <p class="description-procedure">
                            Kunjungi situs web untuk memeriksa ketersediaan jadwal sesuai keinginan Anda.
                            </p>
                    </div>
                    <div class="step-procedure col-md-12">
                            <img src="{{ asset('img/procedure/format-order.png')}}" class="img-procedure">
                            <h2 class="title-procedure">Pengisian Format Order :</h2>
                            <p class="description-procedure">
                            Setelah melalukan cek jadwal, anda bisa langsung mengisi form di format order yang tersedia di kolom pemesanan, jika ada requset pemakaian atau pose yang anda inginkan, bisa langsung masukan ke dalam file. 
                            </p>
                    </div>

                    <div class="step-procedure col-md-12">
                            <img src="{{ asset('img/procedure/fix-order.png')}}" class="img-procedure">
                            <h2 class="title-procedure">Fix Order</h2>
                            <p class="description-procedure">
                            Tagihan akan di berikan di ahir pengisian format order, pemesanan akan di proses setelah tagihan di bayarkan.
                            </p>
                    </div>
                    <div class="step-procedure col-md-12">
                            <img src="{{ asset('img/procedure/transaksi.png')}}" class="img-procedure">
                            <h2 class="title-procedure">Transaksi</h2>
                            <p class="description-procedure">
                            Setelah pembayaran selesai, order Anda akan segera di proses.
                            </p>
                    </div>
                    <div class="step-procedure col-md-12">
                            <img src="{{ asset('img/procedure/pengiriman-produk.png')}}" class="img-procedure">
                            <h2 class="title-procedure">Pengiriman Produk ke Alamat Kami:</h2>
                            <p class="description-procedure">
                            Selanjutnya Lakukan pengiriman ke alamat kami yang sudah di infokan di invoice pemesanan.
                            </p>
                    </div>
                    <div class="step-procedure col-md-12">
                            <img src="{{ asset('img/procedure/sesi-photoshoot.png')}}" class="img-procedure">
                            <h2 class="title-procedure">Proses Photoshoot</h2>
                            <p class="description-procedure">
                            Tim kami akan melakukan sesi photoshoot yang sesuai dengan jadwal yang telah anda pilih. 
                            </p>
                    </div>
                    <div class="step-procedure col-md-12">
                            <img src="{{ asset('img/procedure/hasil-photo.png')}}" class="img-procedure">
                            <h2 class="title-procedure">Penerimaan Hasil Photo</h2>
                            <p class="description-procedure">
                            Setelah proses photoshoot selesai, tim kami akan melakukan editing dan penyempurnaan pada hasil foto dan hasil foto akan di berikan h+2 setelah photoshoot dalam bentuk link google drive di akun website anda masing-masing.
                            </p>
                    </div>
                    <div class="step-procedure col-md-12">
                            <img src="{{ asset('img/procedure/pengembalian-produk.png')}}" class="img-procedure">
                            <h2 class="title-procedure">Pengembalian Produk</h2>
                            <p class="description-procedure">
                            Setelah Anda menerima hasil foto, produk Anda akan dikembalikan dengan alamat yang tertera di format pengisian awal. Pengiriman paling lambat dikirimkan H+7 setelah photoshoot.
                            </p>
                    </div>
                </div>
            </div>
            

        </div>
    </section><!-- End Recent Photos Section -->
    
    <!-- ======= Recent Photos Section ======= -->
   
</main><!-- End #main -->

@endsection