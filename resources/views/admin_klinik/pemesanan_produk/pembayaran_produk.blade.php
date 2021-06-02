@extends('layout.master')
@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Pembayaran Treatment</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/DashboardAdmin')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard Pembayaran Treatment</li>
        </ol>
    </div>

    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran Treatment</h6>
                </div>

                <div class="card-header">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h6><i class="fas fa-check"></i><b> Berhasil!</b></h6>
                        {{ session('success') }}
                    </div>
                    @endif
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>

                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama Member</th>
                                <th>Nominal</th>
                                <th>Bukti Transfer</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Validasi</th>
                                    
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <th>{{$data->member->nama_member}}</th>
                                <td>@rupiah($data->nominal)</td>
                                <td><a href="{{ url('admin/img/transfer/'.$data->bukti_tf) }}">
                                    <img width="100px" src="{{ url('admin/img/transfer/'.$data->bukti_tf) }}">
                                    </a>
                                </td>
                                <td>{{$data->created_at}}</td>
                                <td>              
                                    @if ($data->status == '1')
                                        <span class="badge badge-info">Menunggu Validasi</span>
                                    @elseif ($data->status == '2')
                                        <span class="badge badge-primary">Berhasil</span>
                                    @elseif ($data->status == '3')
                                        <span class="badge badge-danger">Dibatalkan/Tidak sesuai</span>
                                    @endif
                                </td>
                                    <td>
                                        @if ($data->status == 1)
                                            <a class="btn btn-outline-success" href="/pemesanan_produk/validasiPembayaran/{{$data->id_pp}}">
                                                <i class="fas fa-check"></i>
                                                Validasi
                                            </a>
                                            <a class="btn btn-outline-danger"   href="/pemesanan_produk/batalPembayaran/{{$data->id_pp}}">
                                                <i class="fas fa-ban"></i>
                                                Tidak Sesuai
                                            </a>
                                        @endif
                                     </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection