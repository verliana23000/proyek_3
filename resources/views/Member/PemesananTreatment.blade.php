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
                        <h6>Pemesanan Treatment</h6>
                        <h2>{{$treatment->nama_treatment}}</h2>
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
                        <center><h2>{{$treatment->nama_treatment}}</h2><hr>
                            <p class="px-3 mb-4 mt-3">
                                <img width="350px" src="{{ asset('/admin/img/gambar_produk/gambar_treatment/'. $treatment->gambar) }}">
                            </p>
                        </center>
                    </div>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                    <form enctype="multipart/form-data" class="contact-form-area contact-page-form contact-form text-left" action="{{url('AksiPemesanan')}}" method="post">

                    {{csrf_field()}}

                    <label><strong>Id Pemesanan Treatment : </strong></label>
                        <input type="text" name="id" class="form-control" placeholder="Id Pemesanan Treatment" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Id Pemesanan'" value=" S-{{ rand() }}" readonly>

                    <input type="text" name="id_pemesanan_treatment" value="{{$treatment->id}}" hidden>
                                        
                    <label><strong>Tanggal Treatment : </strong></label>
                        <input type="date" class="form-control" name="tanggal_treatment" placeholder="Pilih Tanggal Treatment" onfocus="this.placeholder = ''"
                                     onblur="this.placeholder = 'Pilih Tanggal Treatment'">
                        @if ($errors->has('tanggal_treatment'))
                          <span class="text-danger"><p class="text-right">* {{$errors->first('tanggal_treatment') }}</p></span>
                        @endif
                    <input type="submit" style="color: black" class="btn btn-warning" value="Pesan">
                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->

<!-- content -->

@endsection