@extends('layout.master')
@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Pemesanan Produk</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard Pemesanan Produk</li>
        </ol>
    </div>

    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Batal Pemesanan Produk</h6>
                </div>
                <form class="contact-form-area contact-page-form contact-form text-left" action="/pemesanan_produk/dibatalkanPemesanan/{{$datas->id_pp}}" method="post">

                    @csrf

                    <div class="form-group">
                      <label><b>Keterangan Dibatalkan</b></label>
                      <input type="text" class="form-control" name="ket_batal" placeholder="Masukkan Keterangan Dibatalkan">
                    </div>
                    @if ($errors->has('ket_batal'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('ket_batal') }}</p></span>
                      @endif

                    <div class="form-group"> 
                        <input type="reset" class="btn btn-secondary"  value="Reset">
                        <input type="submit" class="btn btn-danger" value="Batalkan">
                    </div>
                </form>
            </div>
        </div>
@endsection