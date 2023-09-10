@extends('layout-users.app')
@section('title', 'ArtSpace Photoshoot')

@section('content')


<main id="main">

    <!-- ======= Recent Photos Section ======= -->
    <section id="recent-photos" class="recent-photos mt-4">
        <div class="container">
            <div class="text-center my-5">
                <a href="{{ route('order.service') }}" class="btn btn-secondary text-center btn-join">JOIN SLOT</a>
            </div>
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
                    <p>Konsep foto exclusive dari segi background, model dan pose serta hasil yang diterima lebih berkonten dan bervariatif.</p>
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
                <div class="col-lg-3 col-md-3 col-6 mt-3 mb-5">
                    <div class="video-crop">
                        <video controls class="img-product">
                            <source src="https://drive.google.com/uc?export=download&id=1Xr4RyLlz1YmWCnzOxOwH-JytcFPF6lfm">
                        </video>
                        <p class="text-video">Mini teaser durasi 30 detik</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mt-3 mb-5">
                    <div class="video-crop">
                        <video controls class="img-product">
                            <source src="https://drive.google.com/uc?export=download&id=1kYIIVT5apnG_rK3QvSIMMYuREPOOKZ1d">
                        </video>
                        <p class="text-video">Video Reels</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mt-3 mb-5">
                    <div class="video-crop">
                        <video controls class="img-product">
                            <source src="https://drive.google.com/uc?export=download&id=1tIQkxuECWz11yHPmc8JUcOEsJTFK2h4s">
                        </video>
                        <p class="text-video">Tutorial</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mt-3 mb-5">
                    <div class="video-crop">
                        <video controls class="img-product">
                            <source src="https://drive.google.com/uc?export=download&id=1-4iZFmbjLv7IcYr-9bTWTDbrWxwBE-xY">
                        </video>
                        <p class="text-video">Video ADS</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mt-3 mb-5">
                    <div class="video-crop">
                        <video controls class="img-product">
                            <source src="https://drive.google.com/uc?export=download&id=1gv1-tJ1b5SCgNJNFzpwBOR-hLxJcvw1_">
                        </video>
                        <p class="text-video">Video Mirror</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mt-3 mb-5">
                    <div class="video-crop">
                        <video controls class="img-product">
                            <source src="https://drive.google.com/uc?export=download&id=1JCr9do9nHzNswN18rAdQaHwPDG_oRA7K">
                        </video>
                        <p class="text-video">Video Mirror ala ala</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mt-3 mb-5">
                    <div class="video-crop">
                        <video controls class="img-product">
                            <source src="https://drive.google.com/uc?export=download&id=1zoQiPlcY_HnxCSPj0lY8dVcHUWSASa2a">
                        </video>
                        <p class="text-video">VIDEO CREATIVE DESK</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mt-3 mb-5">
                    <div class="video-crop">
                        <video controls class="img-product">
                            <source src="https://drive.google.com/uc?export=download&id=1sBl8cdr6NAGTZx5N4K6NPd1dEjBhHK_v">
                        </video>
                        <p class="text-video">VIDEO REVIEW 1 MENIT</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mt-3 mb-5">
                    <div class="video-crop">
                        <video controls class="img-product">
                            <source src="https://drive.google.com/uc?export=download&id=1WH7TMKyd_802k1wb7nE651ZYJOYTpJrr">
                        </video>
                        <p class="text-video">Teaser</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mt-3 mb-5">
                    <div class="video-crop">
                        <video controls class="img-product">
                            <source src="https://drive.google.com/uc?export=download&id=1JHKbySxMbmaqkI9NeWEkAVa99jJY4CTF">
                        </video>
                        <p class="text-video">Teaser serian</p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Recent Photos Section -->


</main><!-- End #main -->

@endsection