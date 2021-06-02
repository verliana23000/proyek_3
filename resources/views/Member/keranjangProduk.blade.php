<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>E-Beauty</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('template_member/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('template_member/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="{{ asset('template_member/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ url('fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('template_member/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template_member/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template_member/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template_member/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template_member/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template_member/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('template_member/assets/css/style.css') }}" rel="stylesheet">

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

            <h1 class="logo me-auto"><a href="{{ url('/') }}">E-Beauty</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="{{ '/' }}">Home</a></li>
                    <li><a class="nav-link scrollto" href="{{ url('/produk_member') }}">Produk</a></li>
                    <li><a class="nav-link scrollto" href="{{ url('/treatment_member') }}">Treatment</a></li>
                    <a class="nav-link" href="{{ url('Member/keranjangProduk') }}"><i
                            class="fa fa-shopping-cart"></i><a>
                </ul>
            </nav>
        </div>
        <script type="text/javascript">
            function startCalculate() {
                interval = setInterval("Calculate()", 1);
            }

            function Calculate() {
                var a = document.form1.harga_produk.value;
                var c = document.form1.jumlah.value;
                document.form1.total.value = (c * a);
            }

            function stopCalc() {
                clearInterval(interval);
            }

        </script>
    </header><!-- End Header -->


    <main id="main">

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="section-title">
                    <div class="row">
                        <div class="col-8">
                            <div class="card" style="box-shadow: 2px 5px 5px  rgba(128, 128, 128, 0.247);">
                                <div class="card-body">
                                    <H4 class="mb-5"><i class="fas fa-cart-plus me-2"></i> Riwayat Pemesanan Produk</H4>
                                    <table class="table table-hover">
                                        @if (!empty($pemesanan))
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto</th>
                                                    <th>Nama Produk</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Total</th>
                                                    <th>
                                                        <center>Action</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @foreach ($pemesanan as $pemesanan)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td><img src="{{ url('admin/img/gambar_produk/' . $pemesanan->produk->gambar) }}"
                                                                class="rounded mx-auto d-block img-fluid" width="100px">
                                                        </td>
                                                        <td>{{ $pemesanan->produk->nama_produk }}</td>
                                                        <td>{{ $pemesanan->jumlah }}</td>
                                                        <td>Rp.{{ number_format($pemesanan->produk->harga) }}</td>
                                                        <td>Rp.{{ number_format($pemesanan->total) }}</td>
                                                        <td>
                                                            <form
                                                                action="{{ url('Member/keranjangProduk') }}/{{ $pemesanan->id_detail_pp }}"
                                                                method="post">
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                                                <button type="submit" class="btn btn-danger" onclick="
                                                        return confirm('Anda Yakin Akan Menghapus Data ?');"><i
                                                                        class="fa fa-trash"></i></button>
                                                            </form>
                                                        </td>
                                                @endforeach
                                                </tr>
                                                <tr class="mt-3">
                                                    <td colspan="5" align="right"><i class="fas fa-coins"></i> Total
                                                        Harga
                                                    </td>
                                                    <td>Rp.{{ number_format($pemesanan->total) }}</td>
                                                </tr>
                                            </tbody>
                                    </table>
                                @else
                                    Tidak Ada Obat Yang Masuk Keranjang
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <H4><i class="fas fa-shopping-cart"></i> Konfirmasi Check Out</H4>
                                    @if (!empty($pemesananProduk))
                                        <form
                                            action=" {{ url('/validasiPembayaran') }}/{{ $pemesananProduk->id_pp }} "
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <table class="table ">
                                                <tr>
                                                    <td><strong>Nama Pembeli</strong></td>
                                                    <td>:</td>
                                                    <td><input class="form-control" type="text"
                                                            value="{{ Session::get('nama_member') }} " ReadOnly></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Pilih Metode Pembayaran</strong></td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <select name="metode_pembayaran" id="select"
                                                                    type="select" class="form-control">
                                                                    <option value="">Pilih Metode</option>

                                                                    <option value="1" name="metode_pembayaran"
                                                                        type="select">
                                                                        Transfer</option>
                                                                    <option value="2" name="metode_pembayaran"
                                                                        type="select">
                                                                        Bayar Ditempat</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>No HP</strong></td>
                                                    <td>:</td>
                                                    <td><input class="form-control" type="number" name="no_telepon"
                                                            value="{{ $pemesananProduk->member->no_telepon }}"
                                                            required><small>*Isi dengan Nomor Handphone yang masih
                                                            aktif</small>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="col-12 float-right" align="right">
                                                <tr>
                                                    <td>
                                                        <button type="submit"
                                                            class="btn btn-primary text-black py-2 px-3"><i
                                                                class="fas fa-cart-plus"></i> Checkout</button>
                                                    </td>
                                                </tr>
                                            </div>
                                        </form>
                                    @endif
                                    </td>
                                    </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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



        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="{{ asset('template_member/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('template_member/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('template_member/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('template_member/assets/vendor/php-email-form/validate.js') }}"></script>
        <script src="{{ asset('template_member/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('template_member/assets/js/main.js') }}"></script>

</body>

</html>
