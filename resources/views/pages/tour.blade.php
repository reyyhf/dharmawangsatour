@extends('layouts.frontend.master')

@section('content')

<!-- ======= Hero Section ======= -->
<main id="main">
    <section id="services" class="services section-bg">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Layanan Kami</h2>
                <p>Check out the great services we offer</p>
            </div>

            <div class="row">
                @foreach ($data_paket as $paket)
                @if ($paket->id % 4 == 1)
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <a href="{{ asset('assets/img/paket/'.$paket->gambar)}}" class="venobox"><img
                                src="{{ asset('assets/img/paket/'.$paket->gambar)}}" class="img-fluid" alt=""></a>
                        <h4 class="title"><a
                                href="{{ asset('assets/img/paket/'.$paket->gambar)}}">@if ($paket->inap!=0)
                                {{ $paket->destinasi." - ".$paket->durasi."H".$paket->inap."M" }}
                                @else
                                {{ $paket->destinasi." - ".$paket->durasi."H" }}
                                @endif</a></h4>
                    </div>
                </div>
                @elseif ($paket->id % 4 == 2)
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="250">
                    <div class="icon-box">
                        <a href="{{ asset('assets/img/paket/'.$paket->gambar)}}" class="venobox"><img
                                src="{{ asset('assets/img/paket/'.$paket->gambar)}}" class="img-fluid" alt=""></a>
                        <h4 class="title"><a
                                href="{{ asset('assets/img/paket/'.$paket->gambar)}}">@if ($paket->inap!=0)
                                {{ $paket->destinasi." - ".$paket->durasi."H".$paket->inap."M" }}
                                @else
                                {{ $paket->destinasi." - ".$paket->durasi."H" }}
                                @endif</a></h4>
                    </div>
                </div>
                @elseif ($paket->id % 4 == 3)
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <a href="{{ asset('assets/img/paket/'.$paket->gambar)}}" class="venobox"><img
                                src="{{ asset('assets/img/paket/'.$paket->gambar)}}" class="img-fluid" alt=""></a>
                        <h4 class="title"><a
                                href="{{ asset('assets/img/paket/'.$paket->gambar)}}">@if ($paket->inap!=0)
                                {{ $paket->destinasi." - ".$paket->durasi."H".$paket->inap."M" }}
                                @else
                                {{ $paket->destinasi." - ".$paket->durasi."H" }}
                                @endif</a></h4>
                    </div>
                </div>
                @elseif ($paket->id % 4 == 0)
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="550">
                    <div class="icon-box">
                        <a href="{{ asset('assets/img/paket/'.$paket->gambar)}}" class="venobox"><img
                                src="{{ asset('assets/img/paket/'.$paket->gambar)}}" class="img-fluid" alt=""></a>
                        <h4 class="title"><a
                                href="{{ asset('assets/img/paket/'.$paket->gambar)}}">@if ($paket->inap!=0)
                                {{ $paket->destinasi." - ".$paket->durasi."H".$paket->inap."M" }}
                                @else
                                {{ $paket->destinasi." - ".$paket->durasi."H" }}
                                @endif</a></h4>
                    </div>
                </div>
                @endif
                @endforeach

            </div>
            {{-- <div class="row">
              <a href="/tour"><button type="button" class="btn btn-warning" data-aos="zoom-in" data-aos-delay="100" style="position: absolute; right: 285px;background-color: #eb5d1e; color: #ffffff;">Lebih Banyak >></button></a>
            </div> --}}
        </div>
        </div>
    </section>

    <section id="tour" class="tour">
        <div class="container">

            <div class="row justify-content-between" data-aos="fade" data-aos-delay="5">
                {{-- <form action="/tour/hitung" method="post" role="form" class="tour-form">
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
                 --}}
                <form action="tour/create" method="post" role="form" class="tour-form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Paket Destinasi</label>
                        <select id="pilihpaket" name="pilihpaket" class="form-control pilihpaket" data-rule="minlen:4"
                            data-msg="Pilih salah satu">
                            <option selected>Choose...</option>
                            @foreach ($data_paket as $paket)
                            <option value="{{ $paket->id }}">
                                {{$paket->destinasi.' - '.$paket->durasi.' hari - '.$paket->inap.' malam'}}</option>
                            @endforeach
                        </select>
                        <input type="number" class="form-control" name="id_paket" id="id_paket" data-rule="minlen:4" hidden/>

                        <div class="validate"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="bus">Transportasi</label>
                            <input type="number" class="form-control" name="id_bus" id="id_bus" data-rule="minlen:4" hidden/>
                            <select id="bus" name="bus" class="form-control bus" data-rule="email"
                                data-msg="Pilih salah satu">
                                <option selected>Choose...</option>
                                <option value="1">Medium Bus</option>
                                <option value="2">Big Bus</option>
                                <option value="3">Super Big Bus</option>
                            </select>
                            <div class="validate"></div>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="name">Jumlah</label>
                            <input type="number" class="form-control form-control-sm jumlah_bus" name="jumlah_bus" id="jumlah_bus"
                                data-rule="minlen:4" data-msg="Harus terisi" />
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-row jmlhotel">
                        

                    </div>
                    <input type="number" class="form-control" name="id_hotel" id="id_hotel" data-rule="minlen:4" hidden/>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="">Konsumsi (Berapa kali)</label>
                            <input type="number" class="form-control" name="makan" id="makan" data-rule="minlen:4" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Budget</label>
                            <input type="number" class="form-control" name="budget_makan" id="budgetmakan" data-rule="minlen:4" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="">Snack (Berapa kali)</label>
                            <input type="number" class="form-control" name="snack" id="snack" data-rule="minlen:4" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Budget</label>
                            <input type="number" class="form-control" name="budget_snack" id="budgetsnack" data-rule="minlen:4" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Jumlah Pendamping</label>
                        <input type="number" class="form-control form-control-sm" name="jumlah_pendamping" id="jumlah_pendamping"
                            data-rule="minlen:4" data-msg="Harus terisi" />
                        <div class="validate"></div>
                    </div>
                    <div class="form-row pendamping">

                    </div>
                    <div class="form-group">
                        <label for="name">Jumlah Peserta</label>
                        <input type="number" class="form-control form-control-sm" name="jumlah_peserta" id="jumlah_peserta"
                            data-rule="minlen:4" data-msg="Harus terisi" />
                        <div class="validate"></div>
                    </div>
                    <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class=""><button style="background-color: #eb5d1e; color: #fff; margin-bottom: 10px;" class="button btn btnhitung" type="button" name="btnhitung">Hitung</button></div>
                    <div class="form-group col-md-6">
                        <label for="name">Hasil (Per Orang)</label>
                        <input type="number" class="form-control form-control-sm" name="hasil_hitung" id="hasil"
                            data-rule="minlen:4" data-msg="Harus terisi" />
                        <div class="validate"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control form-control-sm" name="nama" id="nama_pengunjung"
                            data-rule="minlen:4" data-msg="Harus terisi" />
                        <div class="validate"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Email</label>
                        <input type="text" class="form-control form-control-sm" name="email" id="email_pengunjung"
                            data-rule="minlen:4" data-msg="Harus terisi" />
                        <div class="validate"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Nomor Telepon</label>
                        <input type="text" class="form-control form-control-sm" name="telepon" id="nomor_telepon"
                            data-rule="minlen:4" data-msg="Harus terisi" />
                        <div class="validate"></div>
                    </div>
                    <div class=""><button type="submit">Submit</button></div>
                </form>
            </div>

        </div>
    </section>

</main><!-- End #main -->

@stop
