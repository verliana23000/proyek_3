@extends('Member.HomeMember')
@section('content')

<!-- content -->
    
        <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="subscribe">
        <div class="container header-text" id="top">
            <hr>
            <br>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading">
                        <h6>Pemesanan Produk</h6>
                        <h2>{{$produk->nama_produk}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="block-team-member-1 text-left rounded" style="border: 5px solid grey; width: 400px;">
                        <center><h2>{{$produk->nama_produk}}</h2><hr>
                            <p class="px-3 mb-4 mt-3">
                                <img width="350px" src="{{ asset('/admin/img/gambar_produk/'. $produk->gambar) }}">
                            </p>
                        </center>
                    </div>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <form enctype="multipart/form-data" class="contact-form-area contact-page-form contact-form text-left" action="{{url('AksiPemesananProduk')}}" method="post">

                    {{csrf_field()}}

                    <label><strong>Id Pemesanan Produk: </strong></label>
                        <input type="text" name="id" class="form-control" placeholder="Id Pemesanan Produk" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Id Pemesanan'" value=" S-{{ rand() }}" readonly>

                    <input type="text" name="id_pemesanan_produk" value="{{$produk->id}}" hidden>
                    
                    <label><strong>Jumlah Produk : </strong></label>
                        <input type="number" min="1" class="form-control" name="jumlah_produk" placeholder="Jumlah Produk" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Jumlah Produk'">
                        <span style="color: blue">* Hari ini tersedia {{$sisaproduk}} Produk</span>
                        @if ($errors->has('jumlah_produk'))
                          <span class="text-danger"><p class="text-right">* {{$errors->first('jumlah_produk') }}</p></span>
                        @endif
                    <br><hr>
                    <input type="submit" style="color: black" class="btn btn-warning" value="Pesan">
                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->

<!-- content -->

@endsection