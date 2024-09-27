@extends('layouts.frontend.master')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container container-carousel">
        <div class="row" data-aos="fade">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @for ($j = 1; $j <= $datacarousel->count(); $j++)
                        @if ($j==1)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ ($j-1) }}" class="active"></li>
                        @else
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ ($j-1) }}"></li>
                        @endif
                        @endfor
                </ol>
                <div class="carousel-inner">
                    @php
                    $i=1
                    @endphp
                    @foreach ($datacarousel as $carousel)
                    @if ($i==1)
                    <div class="carousel-item active">
                        <img class="w-100" src="{{ asset('assets/img/carousel/'.$carousel->gambar)}}"
                            alt="Slide ke-{{$i}}">
                    </div>
                    @else
                    <div class="carousel-item">
                        <img class="w-100" src="{{ asset('assets/img/carousel/'.$carousel->gambar)}}"
                            alt="Slide ke-{{$i}}">
                    </div>
                    @endif
                    @php
                    $i++
                    @endphp
                    @endforeach
                    {{-- <div class="carousel-item">
              <img class="w-100" src="assets/img/carousel/gambar2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="w-100" src="assets/img/carousel/gambar2.jpg" alt="Third slide">
            </div> --}}
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

</section><!-- End Hero -->
<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row justify-content-between">
                <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
                  <img src="assets/img/about-img.svg" class="img-fluid" alt="" data-aos="zoom-in">
                </div>
                <div class="col-lg-6 pt-5 pt-lg-0">
                  <h3 data-aos="fade-up">ABOUT US</h3>
                  <p data-aos="fade-up" data-aos-delay="100">
                    Dharmawangsa Tour adalah travel yang siap melayani perjalanan anda kemanapun kalian inginkan
                  </p>
                  <div class="row">
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                      <i class="bx bx-world"></i>
                      <h4>Penyedia perjalanan terbaik</h4>
                      <p>Memori dan cerita perjalanan anda adalah prioritas utama bagi kami. Kami memastikan keseluruhan proses liburan anda berjalan baik dan tak terlupakan</p>
                    </div>
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                      <i class="bx bx-body"></i>
                      <h4>Agent berpengalaman</h4>
                      <p>Pengalaman dan jam terbang kami telah membuktikan bahwa kepuasan pelanggan yang terus kembali serta berbagai hal yang kami lewati menjadi dasar kami dalam memberi yang terbaik dan selalu siap memberi solusi bagi anda.</p>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                      <i class="bx bx-happy-alt"></i>
                      <h4>Layanan Terlengkap</h4>
                      <p>Perusahaan dengan Pelayanan atau Service yang lengkap untuk tujuan di seluruh Indonesia</p>
                    </div>
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                      <i class="bx bx-check"></i>
                      <h4>Koneksi Luas</h4>
                      <p>Menjalin kerjasama dengan banyak hotel, villa, perusahaan transportasi pariwisata, restoran, objek wisata, agen perjalanan dan guide local</p>
                    </div>
                    
                  </div>
                </div>
              </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Layanan Kami</h2>
                <p>Check out the great services we offer</p>
            </div>

            <div class="row">
                @foreach ($datapaket->slice(0,12) as $paket)
                @if ($paket->id % 4 == 1)
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <a href="{{ asset('assets/img/paket/'.$paket->gambar)}}" class="venobox"><img
                                src="{{ asset('assets/img/paket/'.$paket->gambar)}}" class="img-fluid" alt=""></a>
                        <h4 class="title"><a
                                href="{{ asset('assets/img/paket/'.$paket->gambar)}}">{{ $paket->destinasi }}</a></h4>
                    </div>
                </div>
                @elseif ($paket->id % 4 == 2)
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="250">
                    <div class="icon-box">
                        <a href="{{ asset('assets/img/paket/'.$paket->gambar)}}" class="venobox"><img
                                src="{{ asset('assets/img/paket/'.$paket->gambar)}}" class="img-fluid" alt=""></a>
                        <h4 class="title"><a
                                href="{{ asset('assets/img/paket/'.$paket->gambar)}}">{{ $paket->destinasi }}</a></h4>
                    </div>
                </div>
                @elseif ($paket->id % 4 == 3)
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <a href="{{ asset('assets/img/paket/'.$paket->gambar)}}" class="venobox"><img
                                src="{{ asset('assets/img/paket/'.$paket->gambar)}}" class="img-fluid" alt=""></a>
                        <h4 class="title"><a
                                href="{{ asset('assets/img/paket/'.$paket->gambar)}}">{{ $paket->destinasi }}</a></h4>
                    </div>
                </div>
                @elseif ($paket->id % 4 == 0)
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="550">
                    <div class="icon-box">
                        <a href="{{ asset('assets/img/paket/'.$paket->gambar)}}" class="venobox"><img
                                src="{{ asset('assets/img/paket/'.$paket->gambar)}}" class="img-fluid" alt=""></a>
                        <h4 class="title"><a
                                href="{{ asset('assets/img/paket/'.$paket->gambar)}}">{{ $paket->destinasi }}</a></h4>
                    </div>
                </div>
                @endif
                @endforeach

            </div>
            <div class="row">
              <a href="/tour"><button type="button" class="btn btn-warning" data-aos="zoom-in" data-aos-delay="100" style="position: absolute; right: 285px;background-color: #eb5d1e; color: #ffffff;">Lebih Banyak >></button></a>
            </div>
        </div>
        </div>
    </section><!-- End Services Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Clients</h2>
                <p>They trusted us</p>
            </div>

            <div class="owl-carousel clients-carousel" data-aos="fade-up" data-aos-delay="100">
                @foreach ($dataclients as $clients)
                <img src="{{ asset('assets/img/clients/'.$clients->gambar)}}" alt="">
                @endforeach
                {{-- <img src="assets/img/clients/client-5.png" alt="">
          <img src="assets/img/clients/client-6.png" alt="">
          <img src="assets/img/clients/client-7.png" alt="">
          <img src="assets/img/clients/client-8.png" alt=""> --}}
            </div>

        </div>
    </section><!-- End Clients Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact section-bg">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Contact Us</h2>
                <p>Contact us the get started</p>
            </div>

            <div class="row">

                <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="info">
                        <div class="address">
                            <i class="icofont-google-map"></i>
                            <h4>Location:</h4>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>

                        <div class="email">
                            <i class="icofont-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>

                        <div class="phone">
                            <i class="icofont-phone"></i>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 55s</p>
                        </div>
                        <iframe
                            src="https://maps.google.com/maps?q=dharmawangsa%20tour%20surabaya&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                    </div>

                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Your Name</label>
                                <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4"
                                    data-msg="Please enter at least 4 chars" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Your Email</label>
                                <input type="email" class="form-control" name="email" id="email" data-rule="email"
                                    data-msg="Please enter a valid email" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4"
                                data-msg="Please enter at least 8 chars of subject" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <label for="name">Message</label>
                            <textarea class="form-control" name="message" rows="10" data-rule="required"
                                data-msg="Please write something for us"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Us Section -->

</main><!-- End #main -->


@stop
