<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-Beauty</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('template_member/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('template_member/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="{{asset('template_member/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{url('fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('style.css')}}">

  <!-- Vendor CSS Files -->
  <link href="{{asset('template_member/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('template_member/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('template_member/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('template_member/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('template_member/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('template_member/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('template_member/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Green - v4.1.0
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{url('/')}}">E-Beauty</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{'/'}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{url('/produk_member')}}">Produk</a></li>
          <li><a class="nav-link scrollto" href="{{url('/treatment_member')}}">Treatment</a></li>
        </ul>
      </nav>
    </div>
    <script type="text/javascript">

        function startCalculate(){
            interval=setInterval("Calculate()",1);
        }
        function Calculate(){
            var a=document.form1.harga_produk.value;
            var c=document.form1.jumlah.value;
            document.form1.total.value=(c*a);
        }
        function stopCalc(){
            clearInterval(interval);
        }
    </script>
  </header><!-- End Header -->
  

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
        </div>

          <div class="col-12">
        <div class="card" style="box-shadow: 2px 5px 5px  rgba(128, 128, 128, 0.247);">
            <div class="card-body">
                <H4><i class="fas fa-cart-plus"></i> Riwayat Pemesanan Produk</H4>

                    <table class="table">

                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th><center>Action</center></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                        ?>
                        @foreach($pemesanan as $pemesanan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $pemesanan->id_pemesanan }}</td>
                                <td>{{ $pemesanan->waktu}}</td>
                                <td>
                                    @if($pemesanan->metode_pembayaran == 1)
                                    <span>Transfer</span>
                                    @else
                                    <span>Bayar Ditempat</span>
                                    @endif
                                </td>
                                <td>
                                    @if($pemesanan->status == 1)
                                    <span class="badge badge-warning">Sudah Pesan & Menunggu Pembayaran</span>
                                    @elseif($pemesanan->status == 2)
                                    <span class="badge text-white" style="background-color: blue">Menunggu Konfirmasi</span>
                                    @elseif($pemesanan->status == 3)
                                    <span class="badge text-white" style="background-color: #3f6ad8">Menunggu di ambil</span>
                                    @elseif($pemesanan->status == 4)
                                    <span class="badge badge-success"> Selesai</span>
                                    @else
                                    <span class="badge badge-danger"> Dibatalkan</i></span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('riwayat')}}/{{ $pemesanan->id_pp}}" class="btn btn-primary"><i class="fa fa-info"></i> Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    @include('sweet::alert')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('template_member/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('template_member/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('template_member/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('template_member/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('template_member/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('template_member/assets/js/main.js')}}"></script>

</body>

</html>