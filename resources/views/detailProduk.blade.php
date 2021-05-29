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

      <h1 class="logo me-auto"><a href="{{url('/home_member')}}">E-Beauty</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{'/home_member'}}">Home</a></li>
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
            <nav class="site-navigation text-right " role="navigation">
            </div>
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2">
            <img src="" class="img-fluid" alt="">
          </div>
          <div class="col-md-5 mt-5">
                <img src="{{ url('admin/img/gambar_produk/'.$produks->gambar_produk) }}" class="rounded mx-auto d-block" width="400">
            </div>

          <div class="col-md-7 mt-5">
                @if(\Session::has('alert'))
                    <div class="alert alert-danger" align="center">
                        <div>{{Session::get('alert')}}</div>
                    </div>
                @endif

                <h2>Pemesanan Produk </h2>
                <table class="table">
                <form method="post" id="form1" name="form1" action="{{ url ('pesan') }}/{{ $produks->id_produk }}">
                {{csrf_field()}}
                    <thead>
                        <tr>
                            <td><strong>Nama Produk</strong></td>
                            <td width="15px">:</td>
                            <td>{{$produks->nama_produk}}</td>
                        </tr>
                        <tr>
                            <td><strong>Nama </strong></td>
                            <td width="15px">:</td>
                            <td>{{$produks->klinik->nama_klinik}}</td>
                        </tr>
                        <tr>
                            <td><strong>Stok</strong> </td>
                            <td width="15px">:</td>
                            <td>{{$produks->stok}} </td>
                        </tr>
                        <tr>
                            <td><strong>Harga</strong> </td>
                            <td width="15px">:</td>
                            <td><input type="text" name="harga_produk" class="form-control" value="{{$produks->harga_produk}}" onfocus="startCalculate()" onblur="stopCalc()" readonly></td>
                        </tr>
                        <tr>
                            <td><strong>Jumlah Beli</strong> </td>
                            <td width="15px">:</td>
                            <td><input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror"  onfocus="startCalculate()" onblur="stopCalc()">
                                @if ($errors->has('jumlah')) <span class="invalid-feedback"><strong>{{ $errors->first('jumlah') }}</strong></span> @endif
                            
                        </tr>
                        <tr>
                            <td><strong>Jumlah Harga</strong> </td>
                            <td width="15px">:</td>
                            <td><input class="form-control" name="total" onfocus="startCalculate()" onblur="stopCalc()" readonly></td>
                        </tr>
                        <tr>
                            <td>
                            <a href="{{ url('home_member') }}" class="button-contactFrom btn_2"><i class="fas fa-arrow-left"></i> Kembali</a>
                                <td width="15px"></td>
                                <td>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#login">
                                    Checkout</button>
                                </td>
                            </td>

                        </tr>
                    </thead>
                </form>
                </table>
            </div>
        </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->


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