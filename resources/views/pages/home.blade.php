@extends('layout-users.app')
@section('title', 'ArtSpace Photoshoot')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url({{ asset('img/slide/bg-slide-1.jpg') }})">
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" style="background-image: url({{ asset('img/slide/bg-slide-2.jpg') }})">
            </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

    </div>
</section><!-- End Hero -->

<main id="main">
        <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
            <div class="text-center mb-5">
                <a href="{{ route('order.service') }}" class="btn btn-secondary text-center btn-join">JOIN SLOT</a>
            </div>
            <div class="section-title">
                <h2 class="brown">ABOUT US</h2>
            </div>

        <div class="row gy-4">
          <div class="col-lg-12">
            <div class="content ps-0 text-center-mobile">
                <h1 class="brown title-about m-0 text-center-mobile">
                <img src="{{ asset('img/about-kompres.jpg') }}" class="img-about img-about-mobile img-fluid rounded-4 mb-4">Art Space</h1>
                <small class="brown">VISUAL DIGITAL MARKETING COMPANY</small>
                <p class="brown text-justify mt-2">

                Art Space adalah sebuah inovatif layanan visual yang berdedikasi dalam fotografi dan video produk berkualitas tinggi untuk kebutuhan digital marketing. Sejak pendiriannya pada tahun 2016, Art Space telah menjadi mitra tepercaya bagi pemilik merek dan pelaku bisnis yang ingin meningkatkan daya tarik dan kesan produk mereka di pasar yang semakin kompetitif.
                <br><br>
                Dengan keahlian dan pengalaman selama bertahun-tahun, Art Space telah mengukir reputasi sebagai studio kreatif yang menghadirkan sentuhan artistik dan profesionalisme dalam setiap karya yang dihasilkan. Tim kreatif mereka dipimpin oleh para ahli fotografi dan videografi berbakat, yang berkomitmen untuk menciptakan visual yang menarik, memikat, dan sesuai dengan identitas merek klien.
                <br><br>
                Art Space memahami betapa pentingnya visual yang menarik dalam memikat perhatian konsumen dan membangun kesan positif. Oleh karena itu, mereka berfokus pada setiap detail dalam pengambilan gambar dan produksi video untuk menghadirkan kualitas yang tak tertandingi.         
                <br><br>
                Tak hanya sekadar menangkap momen, Art Space juga berusaha merangkul keunikan setiap produk dan merek. Mereka tidak hanya menampilkan produk dengan estetika yang menakjubkan, tetapi juga mampu menangkap esensi dan cerita di balik setiap produk, sehingga menghadirkan narasi visual yang kuat dan mampu menyentuh hati audiens.
                <br><br>
                Selain itu, Art Space juga menyediakan layanan konsultasi visual yang bijaksana, membantu klien mengembangkan konsep yang tepat untuk kampanye digital mereka. Dengan pendekatan yang berfokus pada hasil, Art Space berkomitmen untuk membantu merek mencapai tingkat keunggulan yang lebih tinggi dan meraih hasil yang mengesankan di pasar digital yang semakin dinamis.
                <br><br>
                Jadi, apakah Anda seorang pemilik merek yang ingin memaksimalkan potensi produk Anda atau seorang pelaku bisnis yang ingin mencapai dampak yang berarti dalam digital marketing, Art Space adalah mitra ideal untuk merajut visual yang mencengangkan dan mencerahkan perjalanan bisnis Anda menuju kesuksesan.
                </p>
            </div>
          </div>
          
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= models Section ======= -->
    <section id="models" class="models">
        <div class="container">

            <div class="section-title">
                <h2 class="brown">Photo Model</h2>
            </div>
            <div class="row">
                @foreach ($models as $model)
                <div class="col-lg-3 col-md-4 col-6 mb-4">
                    <div class="image-models">
                        <img src="{{ asset('uploads-images/models/').'/'.$model->image }}" class="img-model" alt="{{ $model->name }}">
                    </div>
                    <h4 class="title-model mt-4">{{ $model->name }}</h4>
                    <h4 class="title-model">({{ $model->size }})</h4>
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- End models Section -->

    <!-- ======= Recent Photos Section ======= -->
    <section id="recent-photos" class="recent-photos">
        <div class="container">

            <div class="section-title">
                <h2 class="brown">Hasil Foto</h2>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/gallery/gallery-1.jpg') }}" class="img-product" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/gallery/gallery-2.jpg') }}" class="img-product" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/gallery/gallery-3.jpg') }}" class="img-product" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/gallery/gallery-4.jpg') }}" class="img-product" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/gallery/gallery-5.jpg') }}" class="img-product" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/gallery/gallery-6.jpg') }}" class="img-product" alt="">
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Recent Photos Section -->


        <div class="banner">
            <img src="{{ asset('img/banner/banner-2.jpg') }}" class="img-banner" alt="">
        </div>

</main><!-- End #main -->

@endsection