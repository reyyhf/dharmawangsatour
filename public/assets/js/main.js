/**
* Template Name: Ninestars - v2.0.0
* Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
!(function($) {
  "use strict";

  // Smooth scroll for the navigation menu and links with .scrollto classes
  $(document).on('click', '.nav-menu a, .mobile-nav a, .scrollto', function(e) {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      e.preventDefault();
      var target = $(this.hash);
      if (target.length) {

        var scrollto = target.offset().top;

        if ($('#header').length) {
          scrollto -= $('#header').outerHeight();
        }

        if ($(this).attr("href") == '#header') {
          scrollto = 0;
        }

        $('html, body').animate({
          scrollTop: scrollto
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.nav-menu, .mobile-nav').length) {
          $('.nav-menu .active, .mobile-nav .active').removeClass('active');
          $(this).closest('li').addClass('active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
          $('.mobile-nav-overly').fadeOut();
        }
        return false;
      }
    }
  });

  // Mobile Navigation
  if ($('.nav-menu').length) {
    var $mobile_nav = $('.nav-menu').clone().prop({
      class: 'mobile-nav d-lg-none'
    });
    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>');
    $('body').append('<div class="mobile-nav-overly"></div>');

    $(document).on('click', '.mobile-nav-toggle', function(e) {
      $('body').toggleClass('mobile-nav-active');
      $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
      $('.mobile-nav-overly').toggle();
    });

    $(document).on('click', '.mobile-nav .drop-down > a', function(e) {
      e.preventDefault();
      $(this).next().slideToggle(300);
      $(this).parent().toggleClass('active');
    });

    $(document).click(function(e) {
      var container = $(".mobile-nav, .mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
          $('.mobile-nav-overly').fadeOut();
        }
      }
    });
  } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
    $(".mobile-nav, .mobile-nav-toggle").hide();
  }

  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });

  $('.back-to-top').click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 1500, 'easeInOutExpo');
    return false;
  });

  // Porfolio isotope and filter
  $(window).on('load', function() {
    var portfolioIsotope = $('.portfolio-container').isotope({
      itemSelector: '.portfolio-item',
      layoutMode: 'fitRows'
    });

    $('#portfolio-flters li').on('click', function() {
      $("#portfolio-flters li").removeClass('filter-active');
      $(this).addClass('filter-active');

      portfolioIsotope.isotope({
        filter: $(this).data('filter')
      });
    });

    // Initiate venobox (lightbox feature used in portofilo)
    $(document).ready(function() {
      $('.venobox').venobox();
    });
  });

  // Clients carousel (uses the Owl Carousel library)
  $(".clients-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    responsive: {
      0: {
        items: 2
      },
      768: {
        items: 4
      },
      900: {
        items: 6
      }
    }
  });

  // Initi AOS
  AOS.init({
    duration: 800,
    easing: "ease-in-out"
  });

  $(document).ready(function () {

        var data;
    $(document).on('change', '.pilihpaket', function () {
        var paket_id = $(this).val();

        var a = $(this).parent();
        var div = $(this).parent();
        console.log(paket_id);
        var op = " ";
        var op2 = " ";
        $.ajax({
            type: 'get',
            url: 'http://dharmawangsatour.test/cari',
            data: {'id': paket_id},
            dataType: 'json', //return data will be json
            success: function (data) {
                // console.log("destinasi");
                hbus1 = data.harga_medium;
                hbus2 = data.harga_big;
                hbus3 = data.harga_sbig;
                console.log(data);
                $('#id_bus').val(data.id_bus);
                $('#id_paket').val(paket_id);
                
                // here price is coloumn name in products table data.coln name
                for(var i=0;i<data.jml_hotel;i++){
                  op+='<div class="form-group col-md-3"><label for="name">Hotel ke-'+(i+1)+'</label><input type="text" class="form-control hotel'+i+'" name="hotel'+i+'" id="hotel'+i+'" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" /><div class="validate"></div></div><div class="form-group col-md-3"><label for="name">Jumlah Malam</label><input type="number" class="form-control" name="durasi'+i+'" id="durasi'+i+'" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" /><div class="validate"></div></div><div class="form-group col-md-3"><label for="name">Bintang</label><input type="number" class="form-control" name="bintang'+i+'" id="bintang'+i+'" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" /><div class="validate"></div></div><div class="form-group col-md-3"><label for="name">Orang per Kamar</label><input type="number" class="form-control" name="person'+i+'" id="person'+i+'" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" /><div class="validate"></div></div>';
                  op2+='<div class="form-group col-md-3"><label for="name">Hotel Pendamping ke-'+(i+1)+'</label><input type="text" class="form-control hotel_pendamping'+i+'" name="hotel_pendamping'+i+'" id="hotel_pendamping'+i+'" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" /><div class="validate"></div></div><div class="form-group col-md-3"><label for="name">Jumlah Malam</label><input type="number" class="form-control" name="durasi_pendamping'+i+'" id="durasi_pendamping'+i+'" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" /><div class="validate"></div></div><div class="form-group col-md-3"><label for="name">Bintang</label><input type="number" class="form-control" name="bintang_pendamping'+i+'" id="bintang_pendamping'+i+'" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" /><div class="validate"></div></div><div class="form-group col-md-3"><label for="name">Orang per Kamar</label><input type="number" class="form-control" name="person_pendamping'+i+'" id="person_pendamping'+i+'" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" /><div class="validate"></div></div>';
                   }

                   $('.jmlhotel').html(" ");
                   $('.jmlhotel').append(op);

                   $('.pendamping').html(" ");
                   $('.pendamping').append(op2);
      
              des = data.destinasi.split(" - ");
              console.log(des[0]);

                $('.hotel0').val(des[0]);
                $('.hotel1').val(des[1]);
                $('.hotel2').val(des[2]);

                $('.hotel_pendamping0').val(des[0]);
                $('.hotel_pendamping1').val(des[1]);
                $('.hotel_pendamping2').val(des[2]);

            },
            error: function () {

            }
        });
//         $.ajax({
//           type: 'get',
//           url: 'http://dharmawangsatour.test/cari2',
//           data: {'kota_hotel':des[0],'bintang':bintang,'jumlah_orang':jumlah_orang},
//           dataType: 'json', //return data will be json
//           success: function (data2) {
//             console.log(data2);
// },
//           error: function () {

//           }
//       });

    });

    var des;
    var bus;
    var hbus1,hbus2,hbus3,hargabus;
    var bintang,bintang_pendamping;
    var person,person_pendamping;
    var durasi,durasi_pendamping;
    var makan,budgetmakan,snack,budgetsnack;
    var jml_peserta,jml_pendamping;
    var hasil,hargahotel;
    var fc,vc,ac;
    $(document).on('change', '.bus', function () {
      bus = $(this).val();
      if(bus == 1){
        hargabus = hbus1;
      }else if(bus == 2){
        hargabus = hbus2;
      }else{
        hargabus = hbus3;
      }
      console.log(bus);
      console.log(hargabus);
    });
    

    $(document).on('click', '.btnhitung', function () {
      // var paket_id = $(this).val();
      var jumlah_bus = $('.jumlah_bus').val();
      console.log(jumlah_bus);
      bintang = $('#bintang0').val();
      person = $('#person0').val();
      bintang_pendamping = $('#bintang_pendamping0').val();
      person_pendamping = $('#person_pendamping0').val();
      durasi = $('#durasi0').val();
      durasi_pendamping = $('#durasi_pendamping0').val();
      makan = $('#makan').val();
      budgetmakan = $('#budgetmakan').val()*1000;
      snack = $('#snack').val();
      budgetsnack = $('#budgetsnack').val()*1000;
      jml_peserta = $('#jumlah_peserta').val();
      jml_pendamping = $('#jumlah_pendamping').val();
      $.ajax({
          type: 'get',
          url: 'http://dharmawangsatour.test/cari2',
          data: {'kota_hotel': des[0],'bintang':bintang,'jumlah_orang':person},
          dataType: 'json', //return data will be json
          success: function (data2) {
            
              console.log(data2);
              $('#id_hotel').val(data2.id_hotel);
              if (data2.harga == 0||data2.harga=="") {
                hargahotel=data2.harga_breakfast;
              }else{
                hargahotel=data2.harga;
              }
              console.log(hargahotel);
              console.log(hargabus);
              console.log(jumlah_bus);
              console.log(durasi);
              console.log(makan);
              console.log(budgetmakan);
              console.log(snack);
              console.log(budgetsnack);
              console.log(jml_pendamping);
              console.log(jml_peserta);

              fc = hargabus*jumlah_bus/jml_peserta;
              console.log(fc);
              vc = (durasi*hargahotel)+(makan*budgetmakan)+(snack*budgetsnack);
              console.log(vc);
              ac = (((durasi*hargahotel)+(makan*budgetmakan)+(snack*budgetsnack))*jml_pendamping)/jml_peserta;
              console.log(ac);
              hasil=fc+vc+ac;
              hasil = hasil.toFixed(2);
              console.log(hasil);

              $('#hasil').val(hasil);

          },
          error: function () {

          }
      });


  });

});

  // $(document).ready(function(){
  //   $(document).on('change','.pilihpaket',function(){
  //     var $paket_id =$(this).val();
  //     console.log($paket_id);
      
  //   });
  // })
  

})(jQuery);