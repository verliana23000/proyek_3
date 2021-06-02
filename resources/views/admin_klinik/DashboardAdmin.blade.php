@extends('layout.master')
@section('content')

<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard admin klinik</h1>
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{url('/DashboardAdmin')}}">Home</a></li>
  <li class="breadcrumb-item active" aria-current="page">Dashboard admin klinik</li>
  </ol>
</div>

  <div class="row mb-3">
    <div class="col-lg-12">
    <h5>Data Akun</h5>
  </div>
</div>

  <div class="row mb-3">
    <div class="col-md-6 col-xl-4">
    <div class="card mb-6 widget-content bg-midnight-bloom">
    <div class="widget-content-wrapper text-black">
    <div class="widget-content-left">
    <div class="widget-heading">Data Member</div>
    <div class="widget-subheading">Member</div>
    </div>

  <div class="widget-content-right">
  <div class="widget-numbers text-black"><span></span></div>
  </div>
  </div>
  </div>
  </div>
  
  <div class="col-md-6 col-xl-4">
  <div class="card mb-6 widget-content bg-midnight-bloom">
  <div class="widget-content-wrapper text-black">
  <div class="widget-content-left">

  </div>

  <div class="widget-content-right">
  <div class="widget-numbers text-black">
    <span></span>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  
  <hr>
  <div class="row mb-3">
  <div class="col-lg-12">
  <h5>Pemesanan Produk</h5>
  </div>
  </div>

  <div class="row mb-3">
  <div class="col-md-6 col-xl-4">
  <div class="card mb-6 widget-content bg-arielle-smile">
  <div class="widget-content-wrapper text-black">
  <div class="widget-content-left">
  <div class="widget-heading">Data Produk</div>
  <div class="widget-subheading">Produk</div>
  </div>
  <div class="widget-content-right">
  <div class="widget-numbers text-black">
    <span></span>
  </div>
  </div>
  </div>
  </div>
  </div>
  
  <div class="col-md-6 col-xl-4">
  <div class="card mb-6 widget-content bg-arielle-smile">
  <div class="widget-content-wrapper text-black">
  <div class="widget-content-left">
  <div class="widget-heading">Data Pemesanan Produk</div>
  <div class="widget-subheading">Pemesanan Produk</div>
  </div>
  
  <div class="widget-content-right">
  <div class="widget-numbers text-black">
    <span></span>
  </div>
  </div>
  </div>
  </div>
  </div>
  
  <div class="col-md-6 col-xl-4">
  <div class="card mb-6 widget-content bg-arielle-smile">
  <div class="widget-content-wrapper text-black">
  <div class="widget-content-left">
  <div class="widget-heading">Data Pembayaran Produk</div>
  <div class="widget-subheading">Pembayaran transfer</div>
  </div>
  <div class="widget-content-right">
  <div class="widget-numbers text-black">
    <span></span>
  </div>
  </div>
  </div>
  </div>
  </div>
 </div>

 <hr>
  <div class="row mb-3">
  <div class="col-lg-12">
  <h5>Pemesanan Treatment</h5>
  </div>
  </div>

  <div class="row mb-3">
  <div class="col-md-6 col-xl-4">
  <div class="card mb-6 widget-content bg-arielle-smile">
  <div class="widget-content-wrapper text-black">
  <div class="widget-content-left">
  <div class="widget-heading">Data Treatment</div>
  <div class="widget-subheading">Treatment</div>
  </div>
  <div class="widget-content-right">
  <div class="widget-numbers text-black">
    <span></span>
  </div>
  </div>
  </div>
  </div>
  </div>
  
  <div class="col-md-6 col-xl-4">
  <div class="card mb-6 widget-content bg-arielle-smile">
  <div class="widget-content-wrapper text-black">
  <div class="widget-content-left">
  <div class="widget-heading">Data Pemesanan Treatment</div>
  <div class="widget-subheading">Pemesanan Treatment</div>
  </div>
  
  <div class="widget-content-right">
  <div class="widget-numbers text-black">
    <span></span>
  </div>
  </div>
  </div>
  </div>
  </div>
  
  <div class="col-md-6 col-xl-4">
  <div class="card mb-6 widget-content bg-arielle-smile">
  <div class="widget-content-wrapper text-black">
  <div class="widget-content-left">
  <div class="widget-heading">Data Pembayaran Treatment</div>
  <div class="widget-subheading">Pembayaran transfer</div>
  </div>
  <div class="widget-content-right">
  <div class="widget-numbers text-black">
    <span></span>
  </div>
  </div>
  </div>
  </div>
  </div>
 </div>
  
  <hr>
  <div class="row mb-3">
  <div class="col-lg-12">
  <h5>Antrian</h5>
  </div>
  </div>
  <div class="row mb-3">
  <div class="col-md-6 col-xl-4">
  <div class="card mb-6 widget-content bg-arielle-smile">
  <div class="widget-content-wrapper text-black">
  <div class="widget-content-left">
  <div class="widget-heading">Data Antrian</div>
  <div class="widget-subheading">Antrian Treatment</div>
  </div>
  <div class="widget-content-right">
  <div class="widget-numbers text-black">
    <span></span>
  </div>
  </div>
  </div>
  </div>
  </div>
  <div class="col-md-6 col-xl-4">
  <div class="card mb-6 widget-content bg-arielle-smile">
  <div class="widget-content-wrapper text-black">
  <div class="widget-content-left">
  </div>
  <div class="widget-content-right">
  <div class="widget-numbers text-black">
    <span></span>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
@endsection