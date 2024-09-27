@extends('layouts.frontend.master')

@section('content')

  <!-- ======= Hero Section ======= -->
   <main id="main">

    <section id="portfolio" class="portfolio">
        <div class="container">
  
          <div class="section-title" data-aos="fade-up">
            <h2>Galeri Foto</h2>
            <p>Check out our new picture of Tours</p>
          </div>
   
          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach ($datagaleri as $galeri)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-hover">
                  <a href="{{ asset('assets/img/galeri/'.$galeri->gambar)}}" class="venobox"><img src="{{ asset('assets/img/galeri/'.$galeri->gambar)}}" class="img-fluid" alt=""></a>
              </div>
          </div>
            @endforeach
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-hover">
                    <a href="assets/img/portfolio/portfolio-1.jpg" class="venobox"><img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt=""></a>
                </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-hover">
                    <a href="assets/img/portfolio/portfolio-2.jpg" class="venobox"><img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt=""></a>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-hover">
                    <a href="assets/img/portfolio/portfolio-3.jpg" class="venobox"><img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt=""></a>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-hover">
                    <a href="assets/img/portfolio/portfolio-4.jpg" class="venobox"><img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt=""></a>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-hover">
                    <a href="assets/img/portfolio/portfolio-5.jpg" class="venobox"><img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt=""></a>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-hover">
                    <a href="assets/img/portfolio/portfolio-6.jpg" class="venobox"><img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt=""></a>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-hover">
                    <a href="assets/img/portfolio/portfolio-7.jpg" class="venobox"><img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt=""></a>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-hover">
                    <a href="assets/img/portfolio/portfolio-8.jpg" class="venobox"><img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt=""></a>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-hover">
                    <a href="assets/img/portfolio/portfolio-9.jpg" class="venobox"><img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt=""></a>
              </div>
            </div>
  
          </div>
  
        </div>
      </section>

  </main><!-- End #main -->


@stop