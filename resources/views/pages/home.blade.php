@extends('layout-users.app')
@section('title', 'ArtSpace Photoshoot')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url({{ asset('img/slide/slide-1.jpg') }})">
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" style="background-image: url({{ asset('img/slide/slide1.jpg') }})">
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" style="background-image: url({{ asset('img/slide/slide2.jpg') }})">
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

            <div class="section-title">
                <h2 class="brown">ABOUT US</h2>
            </div>

        <div class="row gy-4">
          <div class="col-lg-6 box-about">
            <img src="{{ asset('img/about-kompres.jpg') }}" class="img-about img-fluid rounded-4 mb-4" alt="">
          </div>
          <div class="col-lg-6">
            <div class="content ps-0 ps-lg-5 text-center-mobile">
                <h1 class="brown title-about m-0 text-center-mobile">Art Space</h1>
                <small class="brown">VISUAL DIGITAL MARKETING COMPANY</small>
                <hr class="line">
                <p class="brown text-justify">
                    Art Space adalah sebuah layanan visual atau jasa foto produk yang berdiri sejak tahun 2016 dan berfokus pada konten digital marketing. 
                </p>
                <p class="brown text-justify">
                    Art Space bertujuan membantu para owner brand untuk meningkatkan kualitas foto dan video dari produk yang dipasarkan.
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
                    <h4 class="title-model mt-4"><a href="">{{ $model->name }}</a></h4>
                    <p class="desc-model">{{ 'Rp '.number_format($model->price, 0, ',', '.') }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- End models Section -->

    <!-- ======= Recent Photos Section ======= -->
    <section id="recent-photos" class="recent-photos">
        <div class="container">

            <div class="section-title">
                <h2 class="brown">Product</h2>
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
            <img src="{{ asset('img/banner/banner-1.webp') }}" class="img-banner" alt="">
        </div>

</main><!-- End #main -->

@endsection