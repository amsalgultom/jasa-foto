@extends('layout-users.app')
@section('title', 'ArtSpace Photoshoot')

@section('content')


<main id="main">
    
    <!-- ======= Recent Photos Section ======= -->
    <section id="recent-photos" class="recent-photos mt-4">
        <div class="container">

            <div class="section-title brown">
                <h2 class="brown">CATALOG</h2>
                <div class="w-75 mx-auto">
                    <p>Sebuah konsep foto standar yang menunjukan visual produk tersebut dari tampak depan, samping, belakang dan detail yang konsep fotonya sudah ditentukan oleh team ArtSpace.</p>
                </div>
            </div>
            <div class="customer-logos slider">
                <div class="slide">
                    <img src="{{ asset('img/catalog/C21.jpg') }}">
                    <p class="text-catalog">Depan</p>
                </div>
                <div class="slide">
                    <img src="{{ asset('img/catalog/C22.jpg') }}">
                    <p class="text-catalog">Samping</p>
                </div>
                <div class="slide">
                    <img src="{{ asset('img/catalog/C23.jpg') }}">
                    <p class="text-catalog">Belakang</p>
                </div>
                <div class="slide">
                    <img src="{{ asset('img/catalog/C24.jpg') }}">
                    <p class="text-catalog">Setengah Badan</p>
                </div>
                <div class="slide">
                    <img src="{{ asset('img/catalog/C25.jpg') }}">
                    <p class="text-catalog">Detail</p>
                </div>
                <div class="slide">
                    <img src="{{ asset('img/catalog/C11.jpg') }}">
                    <p class="text-catalog">Depan</p>
                </div>
                <div class="slide">
                    <img src="{{ asset('img/catalog/C12.jpg') }}">
                    <p class="text-catalog">Samping</p>
                </div>
                <div class="slide">
                    <img src="{{ asset('img/catalog/C13.jpg') }}">
                    <p class="text-catalog">Belakang</p>
                </div>
                <div class="slide">
                    <img src="{{ asset('img/catalog/C14.jpg') }}">
                    <p class="text-catalog">Setengah Badan</p>
                </div>
                <div class="slide">
                    <img src="{{ asset('img/catalog/C15.jpg') }}">
                    <p class="text-catalog">Detail</p>
                </div>
                <div class="slide">
                    <img src="{{ asset('img/catalog/C31.jpg') }}">
                    <p class="text-catalog">Depan</p>
                </div>
                <div class="slide">
                    <img src="{{ asset('img/catalog/C32.jpg') }}">
                    <p class="text-catalog">Samping</p>
                </div>
                <div class="slide">
                    <img src="{{ asset('img/catalog/C33.jpg') }}">
                    <p class="text-catalog">Belakang</p>
                </div>
                <div class="slide">
                    <img src="{{ asset('img/catalog/C34.jpg') }}">
                    <p class="text-catalog">Setengah Badan</p>
                </div>
                <div class="slide">
                    <img src="{{ asset('img/catalog/C35.jpg') }}">
                    <p class="text-catalog">Detail</p>
                </div>
            </div>
            

        </div>
    </section><!-- End Recent Photos Section -->
    

    <!-- ======= Recent Photos Section ======= -->
    <section id="recent-photos" class="recent-photos">
        <div class="container">

            <div class="section-title brown">
                <h2 class="brown">LOOKBOOK</h2>
                <div class="w-75 mx-auto">
                    <p>Konsep foto exclusive dari segi background, model dan pose serta hasil yang diterima  lebih berkonten dan bervariatif.</p>
                </div>  
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/lookbook/DSCF7173.jpg') }}" class="img-product" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/lookbook/DSCF6762.jpg') }}" class="img-product" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/lookbook/IMG_3785.jpg') }}" class="img-product" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/lookbook/DSCF7053.jpg') }}" class="img-product" alt="">
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Recent Photos Section -->

     <!-- ======= Recent Photos Section ======= -->
     <section id="recent-photos" class="recent-photos">
        <div class="container">

            <div class="section-title">
                <h2 class="brown">CREATIVE DESK</h2>
                <div class="w-75 mx-auto">
                    <p>Layanan foto produk tanpa model atau biasanya disebut dengan Creative Desk. Hasil yang didapat variatif dan menunjukan varian warna produk.</p>
                </div>  
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/creative-desk/CD-1.jpg') }}" class="img-product" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/creative-desk/CD-2.jpg') }}" class="img-product" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/creative-desk/CD-3.jpg') }}" class="img-product" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/creative-desk/CD-4.jpg') }}" class="img-product" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/creative-desk/CD-5.jpg') }}" class="img-product" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/creative-desk/CD-6.jpg') }}" class="img-product" alt="">
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Recent Photos Section -->

    <section id="recent-photos" class="recent-photos">
        <div class="container">

            <div class="section-title brown">
                <h2 class="brown">PRIVATE SHOOT</h2>
                <div class="w-75 mx-auto">
                    <p>Private shoot adalah layanan dari segi background, model, jadwal dll disesuaikan dengan konsep dari pihak Client.</p>
                </div>  
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/private-shoot/PS-1.jpg') }}" class="img-ps" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/private-shoot/PS-2.jpg') }}" class="img-ps" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/private-shoot/PS-7.jpg') }}" class="img-ps" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/private-shoot/PS-3.jpg') }}" class="img-ps" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/private-shoot/PS-4.jpg') }}" class="img-ps" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/private-shoot/PS-5.jpg') }}" class="img-ps" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/private-shoot/PS-6.jpg') }}" class="img-ps" alt="">
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Recent Photos Section -->

    <section id="recent-photos" class="recent-photos">
        <div class="container">

            <div class="section-title brown">
                <h2 class="brown">Video</h2>
                <div class="w-75 mx-auto">
                    <p>Paket yang berisi konten untuk menambahkan detail dan visual dari produk yang dijual.</p>
                </div>  
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-2 col-md-2 col-6 mt-3 mb-4">
                    <div class="video-crop">
                        <video controls class="img-product">
                            <source src="{{ asset('video/PKV-1.mov') }}" >
                        </video>
                        <p class="text-video">BTS</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-6 mt-3 mb-4">
                    <div class="video-crop">
                        <video controls class="img-product">
                            <source src="{{ asset('video/PKV-1.mov') }}" >
                        </video>
                        <p class="text-video">ADS</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-6 mt-3 mb-4">
                    <div class="video-crop">
                        <video controls class="img-product">
                            <source src="{{ asset('video/PKV-1.mov') }}" >
                        </video>
                        <p class="text-video">Mini Teaser</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-6 mt-3 mb-4">
                    <div class="video-crop">
                        <video controls class="img-product">
                            <source src="{{ asset('video/PKV-1.mov') }}" >
                        </video>
                        <p class="text-video">Teaser</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-6 mt-3 mb-4">
                    <div class="video-crop">
                        <video controls class="img-product">
                            <source src="{{ asset('video/PKV-1.mov') }}" >
                        </video>
                        <p class="text-video">Tutorial</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-6 mt-3 mb-4">
                    <div class="video-crop">
                        <video controls class="img-product">
                            <source src="{{ asset('video/PKV-1.mov') }}" >
                        </video>
                        <p class="text-video">Review</p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Recent Photos Section -->


</main><!-- End #main -->

@endsection