@extends('layouts.frontend.master')

@section('content')

  <!-- ======= Hero Section ======= -->
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

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
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
  </main><!-- End #main -->


@stop