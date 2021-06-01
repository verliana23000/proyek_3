<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-Beauty</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

    <h1 class="logo me-auto"><a href="#"  style="color: #b4ceff">E-Beauty</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{'/'}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{url('/produk_member')}}">Produk</a></li>
          <li><a class="nav-link scrollto" href="{{url('/treatment_member')}}">Treatment</a></li>
          <li><a><button class="btn btn-outline-info py-1 px-3" data-bs-toggle="modal" data-bs-target="#login" >Login</button></a></li>

<!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">LOGIN </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

      @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
      @endif
      @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
      @endif
                <div class="modal-body">
                  <form action="{{ url('/loginPost') }}" method="post" class="form">
                  {{ csrf_field() }}

                  <div class="form-group input-rounded">
                    <label>Email</label>
                      <input type="email" class="form-control" placeholder="Masukkan Email" name="email" />
                  </div><br>

                  <div class="form-group input-rounded">
                    <label> Password </label>
                      <input type="password" class="form-control" placeholder="Masukkan Password" name="password" />
                  </div><br>

                  <div class="form-inline">
                    <div class="btn">
                      <label> Belum punya akun ? <a href="{{ url('daftar') }}">Buat Akun Baru</a>
                      </label> 
                    </div>
                  </div>
      
        <input id="submit" type="submit" name="submit" value="LOGIN" />
        </form>
      
    </div>
  </div>
</div>
        </div>
    </ul>
    </nav>
  </header><!-- End Header -->

  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(admin/img/facial.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>E-Beauty</span></h2>
              <p>E-COMMERCE PRODUK DAN TREATMENT KECANTIKAN</p>

            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(admin/img/maskeran.jpg)">
          <div class="carousel-container">
            <div class="container">
            <h2 class="animate__animated animate__fadeInDown">Welcome to <span>E-Beauty</span></h2>
              <p>Daftarkan klinik kamu dan gabung bersama kami</p> <a href="{{ url('daftarKlinik') }}">Buat Akun Baru</a>
            </div>
          </div>
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
      <div class="container">

        <div class="section-title">
        </div>
      </div>
    </section><!-- End About Us Section -->
    <div class="section-title">
          <h2>Daftar Klinik Kecantikan</h2>
        </div>
    <section class="section" id="testimonials">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                    <div class="section-heading">
                        <br><h3 style="color: black"></h3></br>
                    </div>
                </div>
            @foreach ($klinik as $klinik)
                
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mobile-bottom-fix-big">
                    <div class="item author-item" >
                        <div class="member-thumb">
                        <img src="{{url('admin/img/logo/'.$klinik->logo)}}" height="200" width="200" alt="">
                            <div class="hover-effect">
                                <div class="hover-content">
                                    <a href="/produk_member" class="main-filled-button">Lihat Produk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                </div>
            @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Testimonials Ends ***** -->
    
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
  <script src="{{('template_member/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{('template_member/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{('template_member/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{('template_member/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{('template_member/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{('template_member/assets/js/main.js')}}"></script>

</body>

</html>