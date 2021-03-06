<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-Beauty</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{('template_member/assets/img/favicon.png')}}" rel="icon">
  <link href="{{('template_member/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="{{('template_member/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{url('fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('style.css')}}">

  <!-- Vendor CSS Files -->
  <link href="{{('template_member/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{('template_member/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{('template_member/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{('template_member/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{('template_member/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{('template_member/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{('template_member/assets/css/style.css')}}" rel="stylesheet">

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

      <h1 class="logo me-auto"><a href="{{'/home_member'}}">E-Beauty</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{'/home_member'}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{url('/produk_member')}}">Produk</a></li>
          <li><a class="nav-link scrollto" href="{{url('/treatment_member')}}">Treatment</a></li>
               
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Produk</h2>
        </div>

        <div class="row">
            @foreach ($kliniks as $klinik)
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-4" data-aos="fade-up">
            <div class="block-team-member-1 text-left rounded">
              <center><img src="{{ url('admin/img/gambar_klinik/'.$klinik->gambar) }}" alt="Image" width="250px" height="250px"></center>
              <p class="px-3 mb-4 mt-3">

                    <span style="color: black">{{$klinik->nama_klinik}}</span>
                    @foreach ($kliniks as $klinik)
                    <span style="color: black"> {{ ($klinik->nama_klinik) }}
                    </span>
                    @endforeach <br>
                    @if($produk->stok <=0)
                    <span class="badge badge-danger">Habis</span>
                    @else
                    <span style="color: green">Rp. {{$produk->harga_produk}}</span> <br>
                    @endif
                    
                    
                <center>
                    @if($produk->stok <= 0)
                        <button class="btn btn-outline-success py-1 px-3" disabled>
                        <i class="fas fa-cart-plus"></i></button>
                    @else
                        <a href="{{url('detailProduk'.$produk->id_produk)}}" class="btn btn-outline-success py-1 px-3" >
                        <i class="fas fa-cart-plus"></i></a>

                        <a href="{{url('detailProduk'.$produk->id_produk)}}" class="btn btn-outline-success py-1 px-3" >
                        Lihat Produk</a>
                    @endif
                </center>
                </p>
                
            </div>
        </div>
            @endforeach


          </div>
        </div>
      </div>
    </div>

      </div>
    </section>
    <!-- End About Us Section -->

</body>
</html>