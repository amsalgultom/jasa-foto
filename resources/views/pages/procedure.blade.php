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
            <div class="row">
                <div class="prosedur">
                    <div class="step-procedure col-md-12">
                            <img src="{{ asset('img/procedure/cek-jadwal.png')}}" class="img-procedure">
                            <h2 class="title-procedure">Cek Jadwal</h2>
                            <p class="description-procedure">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, iste iusto quas eligendi corporis id eius corrupti temporibus velit? Molestias harum voluptatibus veritatis explicabo ut velit deserunt, saepe sit commodi?
                            </p>
                    </div>
                    <div class="step-procedure col-md-12">
                            <img src="{{ asset('img/procedure/fix-order.png')}}" class="img-procedure">
                            <h2 class="title-procedure">Fix Order</h2>
                            <p class="description-procedure">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, iste iusto quas eligendi corporis id eius corrupti temporibus velit? Molestias harum voluptatibus veritatis explicabo ut velit deserunt, saepe sit commodi?
                            </p>
                    </div>
                    <div class="step-procedure col-md-12">
                            <img src="{{ asset('img/procedure/transaksi.png')}}" class="img-procedure">
                            <h2 class="title-procedure">Transaksi</h2>
                            <p class="description-procedure">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, iste iusto quas eligendi corporis id eius corrupti temporibus velit? Molestias harum voluptatibus veritatis explicabo ut velit deserunt, saepe sit commodi?
                            </p>
                    </div>
                    <div class="step-procedure col-md-12">
                            <img src="{{ asset('img/procedure/pengiriman-produk.png')}}" class="img-procedure">
                            <h2 class="title-procedure">Pengiriman Produk</h2>
                            <p class="description-procedure">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, iste iusto quas eligendi corporis id eius corrupti temporibus velit? Molestias harum voluptatibus veritatis explicabo ut velit deserunt, saepe sit commodi?
                            </p>
                    </div>
                    <div class="step-procedure col-md-12">
                            <img src="{{ asset('img/procedure/sesi-photoshoot.png')}}" class="img-procedure">
                            <h2 class="title-procedure">Sesi Photoshoot</h2>
                            <p class="description-procedure">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, iste iusto quas eligendi corporis id eius corrupti temporibus velit? Molestias harum voluptatibus veritatis explicabo ut velit deserunt, saepe sit commodi?
                            </p>
                    </div>
                    <div class="step-procedure col-md-12">
                            <img src="{{ asset('img/procedure/hasil-photo.png')}}" class="img-procedure">
                            <h2 class="title-procedure">Hasil Photo</h2>
                            <p class="description-procedure">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, iste iusto quas eligendi corporis id eius corrupti temporibus velit? Molestias harum voluptatibus veritatis explicabo ut velit deserunt, saepe sit commodi?
                            </p>
                    </div>
                </div>
            </div>
            

        </div>
    </section><!-- End Recent Photos Section -->
    
    <!-- ======= Recent Photos Section ======= -->
   
</main><!-- End #main -->

@endsection