@extends('Member.layout.HomeMember')
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
                        <h6>Pembayaran Treatment</h6>
                        <h2>E-Beauty</h2>
                    </div>
                    <div class="subscribe-content">
                        <div class="subscribe-form">
                            <form action="{{url('CariPembayaran')}}" method="get">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                      <fieldset>
                                        <input type="text" name="q" placeholder="Cari Id Pemesanan" required>
                                      </fieldset>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                      <fieldset>
                                        <button type="submit" class="main-button">Cari</button>
                                      </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            @if(\Session::has('alert-danger'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{Session::get('alert-danger')}}
                </div>
            @endif
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-xs-12">

                    <table width="400px" height="150px">
                        <tr>
                            <td>Id PemesananTreatment</td>
                            <td>:</td>
                            <td>
                                @if(isset($pemesanantreatment))
                                    <strong>{{$pemesanantreatment->id_pemesanan_treatment}}</strong>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Pemesan</td>
                            <td>:</td>
                            <td>
                                @if(isset($pemesanantreatment))
                                    <strong>{{$pemesanantreatment->nama_member}}</strong>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Treatment</td>
                            <td>:</td>
                            <td>
                                @if(isset($pemesanantreatment))
                                    <strong>{{$pemesanantreatment->Treatment->nama_treatment}}</strong>
                                @endif
                                

                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Booking</td>
                            <td>:</td>
                            <td>
                                @if(isset($pemesanantreatment))
                                    <strong>{{$pemesanantreatment->tanggal_treatment}}<strong>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><hr></td>
                            <td><hr></td>
                            <td><hr></td>    
                        </tr>
                        <tr>
                            <td>Harga Treatment</td>
                            <td>:</td>
                            <td>
                                @if(isset($pemesanantreatment))
                                    <strong>@rupiah($pemesanantreatment->Treatment->harga)<strong>
                                @endif
                            </td>    
                        </tr>
                        <tr>
                            <td><hr></td>
                            <td><hr></td>
                            <td><hr></td>    
                        </tr>
                        <tr>
                            <td>Total harga</td>
                            <td>:</td>
                            <td>
                                @if(isset($pemesanantreatment))
                                    <strong>@rupiah($pemesanantreatment->jumlah_harga)<strong>
                                @endif
                            </td>    
                        </tr>
                    </table>
                    <hr>
                    @if(isset($pemesanantreatment))

                        @if(isset($pemesanantreatment->PembayaranTratment))
                            @if ($pemesanantreatment->PembayaranTratment->status_bayar == '1')
                                <p><strong>Status Bayar : </Strong> <span class="badge badge-info">Menunggu Konfirmasi</span> </p>
                            @elseif ($pemesanantreatment->PembayaranTratment->status_bayar == '2')
                                <p><strong>Status Bayar : </Strong> <span class="badge badge-success">Selesai</span> </p>
                            @elseif ($pemesanantreatment->PembayaranTratment->status_bayar == '3')
                                <p><strong>Status Bayar : </Strong> <span class="badge badge-danger">Dibatalkan</span> </p>
                            @endif
                        @endif

                        @if($pemesanantreatment->status_pesan == '1')
                            <strong>Silahkan Melakukan Pembayaran</Strong>
                            <b><p>@rupiah($pemesanantreatment->jumlah_harga)</p></b>
                            <strong>Sebelum :</strong>
                            <label><b><u>{{$besok}} WIB</u></b></label>
                        @endif

                        @if($pemesanantreatment->status_pesan != '1')
                            @if ($pemesanantreatment->status_pesan == '2')
                                <p><strong>Status Pesan : </Strong> <span class="badge badge-info">Menunggu Konfirmasi</span> </p>
                            @elseif ($pemesanantreatment->status_pesan == '3')
                                <p><strong>Status Pesan : </Strong> <span class="badge badge-warning">Belum datang</span> </p>
                            @elseif ($pemesanantreatment->status_pesan == '4')
                                <p><strong>Status Pesan : </Strong> <span class="badge badge-success">Selesai</span> </p>
                            @elseif ($pemesanantreatment->status_pesan == '5')
                                <p><strong>Status Pesan : </Strong> <span class="badge badge-danger">Dibatalkan</span> </p>
                            @endif
                        @endif
                                            
                    @endif
                    <label></label>
                   
                </div>

                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="block-team-member-1 text-left rounded" style="border: 5px solid grey;">
                        <center><h2>E-Beauty</h2><h6>
                            Transfer Bank
                            <br></h6><hr>
                            <h6 style="color: green">Rekening BRI 1234567890</h6>
                            <h6 style="color: green">A / N</h6>
                            <h6 style="color: green">E-Beauty</h6><hr>
                            @if(isset($pemesanantreatment))<h6>{{$pemesanantreatment->tanggal_treatment}}</h6>@endif
                            <br>
                        </center>
                    </div>

                    <br><br>
                    <form enctype="multipart/form-data" class="" action="{{url('AksiPembayaranTreatment')}}" method="post">

                        {{csrf_field()}}
    
                        <input type="text" name="id_pemesanan_treatment" class="form-control" @if(isset($pemesanantreatment))value="{{$pemesanantreatment->id}}"@endif hidden>
                        
                        <label><strong>Nominal Pembayaran : </strong></label>
                        <input type="text" name="nominal" class="form-control"
                        @if(isset($pemesanantreatment))
                            {{ ($pemesanantreatment->status_pesan == '1') ? '' : 'disabled'}} 
                        @else
                            disabled
                        @endif
                        >
                        <br>
                        <label><b>Bukti Transfer</b></label>
                        <input type="file" class="form-control" name="bukti_tf" 
                        @if(isset($pemesanantreatment))
                            {{ ($pemesanantreatment->status_pesan == '1') ? '' : 'disabled'}} 
                        @else
                            disabled
                        @endif
                        >
                        <span class="text-info">
                            <p class="text-left">- Ukuran Maksimal gambar 2 Mb</p>
                        </span>

                        @if ($errors->has('bukti_tf'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('bukti_tf') }}</p></span>
                        @endif

                        <input type="submit" class="btn btn-primary" value="Kirim"
                        @if(isset($pemesanantreatment))
                            {{ ($pemesanantreatment->status_pesan == '1') ? '' : 'disabled'}} 
                        @else
                            disabled
                        @endif
                        >
                    </form>
                
                </div>


            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->

<!-- content -->

@endsection