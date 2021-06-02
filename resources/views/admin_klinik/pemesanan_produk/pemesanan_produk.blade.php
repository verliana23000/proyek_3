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
                    <h6 class="m-0 font-weight-bold text-primary">Data Pemesanan Produk</h6>
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
                                <th>No. Hp</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Status Pemesanan</th>
                                <th>Keterangan Batal</th>
                                <th>Metode Pembayaran</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$data->member->nama_member}}</td>
                                <td>{{$data->member->no_hp}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>
                                    @if ($data->status == '1')
                                        <span class="badge badge-warning">Menunggu Pembayaran</span>
                                    @elseif ($data->status == '2')
                                        <span class="badge badge-info">Menunggu Konfirmasi</span>
                                    @elseif ($data->status == '3')
                                        <span class="badge badge-primary">Menunggu diambil</span>
                                    @elseif ($data->status == '4')
                                        <span class="badge badge-success">Selesai</span>
                                    @elseif ($data->status == '5')
                                        <span class="badge badge-danger">Dibatalkan</span>
                                    @endif
                                </td>
                                <td>{{$data->ket_batal}}</td>
                                <td>
                                    @if ($data->metode_pembayaran == '1')
                                        Transfer
                                    @else($data->metode_pembayaran == '2')
                                        Bayar Ditempat
                                    @endif
                                </td>
                                    <td>
                                        @if ($data->status == '2')
                                        <a class="btn btn-outline-success btn-sm" href="/pemesanan_produk/konfirmasiPemesanan/{{$data->id_pp}}">
                                            <i class="fas fa-check"></i>
                                            Konfirmasi
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm" href="/pemesanan_produk/batalPemesanan/{{$data->id_pp}}">
                                            <i class="fas fa-ban"></i>
                                            Dibatalkan
                                        </a>
                                        @elseif($data->status == 3)
                                        <a class="btn btn-outline-success btn-sm" href="/pemesanan_produk/diambilPemesanan/{{$data->id_pp}}">
                                            <i class="fas fa-check"></i>
                                            Sudah Diambil
                                        </a>
                                        @endif
                                        <a class="btn btn-outline-info" href="MengelolaDetailPemesanan{{$data->id_pemesanan}}">
                                            <i class="fas fa-eye"></i>
                                            Lihat Detail
                                        </a>
                                    </td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#edit-data-{{$data->id_pp}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <form action="{{url('/pemesanan_produk/hapusPemesanan', $data->id_pp)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    {{-- Modal edit status--}}
        <div class="modal fade" id="edit-data-{{$data->id_pp}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Status Pemesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{url('/pemesanan_produk/ubahStatus', $data->id_pp)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_member">Nama Member</label>
                                <input type="text" class="form-control" id="nama_member" name="nama_member"
                                    value="{{$data->member->nama_member}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="no_hp">No Hp</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{$data->member->no_hp}}" readonly>
                            </div>

                            <div class="form-group">
                                <label><b>Status</b></label>
                                <div class="form-select">
                                    <select name="status" class="form-control">
                                        <option value="">Pilih Status</option>
                                        <option value="1">1. Menunggu Pembayaran</option>
                                        <option value="2">2. Menunggu Konfirmasi</option>
                                        <option value="3">3. Menunggu Diambil</option>
                                        <option value="4">4. Selesai</option>
                                        <option value="5">5. Dibatalkan</option>
                                        </select>
                                </div>
                                    @if ($errors->has('status'))
                                    <span class="text-danger"><p class="text-right">* {{ $errors->first('status') }}</p></span>
                                    @endif
                            </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div> 
    {{-- Akhir Modal Edit status--}}
@endsection