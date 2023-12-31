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
          <div class="col-lg-6 box-about">
            <img src="{{ asset('img/about-kompres.jpg') }}" class="img-about img-fluid rounded-4 mb-4" alt="">
          </div>
          <div class="col-lg-6">
            <div class="content ps-0 ps-lg-5 text-center-mobile">
                <h1 class="brown title-about m-0 text-center-mobile">Art Space</h1>
                <small class="brown">VISUAL DIGITAL MARKETING COMPANY</small>
                <hr class="line">
                <p class="brown text-justify">
                Art Space adalah studio visual profesional yang ahli dalam fotografi dan videografi untuk digital marketing. Kami menciptakan visual menarik dengan sentuhan artistik dan kualitas yang esklusif.
                </p>
                <p class="brown text-justify">
                Art Space juga membantu kalian para owner untuk mengembangkan konsep kampanye digital yang menarik. Jika kalian ingin produk kalian menarik dan terkonsep dalam dunia online, Art Space adalah pilihan terbaik!
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
                        <img src="{{ asset('img/gallery/gallery-2-new.jpeg') }}" class="img-product" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/gallery/gallery-3-new.jpeg') }}" class="img-product" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/gallery/gallery-4.jpg') }}" class="img-product" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/gallery/gallery-5-new.jpeg') }}" class="img-product" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="image-product">
                        <img src="{{ asset('img/gallery/gallery-6-new.jpg') }}" class="img-product" alt="">
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