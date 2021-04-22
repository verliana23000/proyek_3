@extends('layout.master')
@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Member</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Member</li>
        </ol>
    </div>

    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Member</h6>
                </div>

                <div class="card-header">
                    <!-- @if (session('success')) -->
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

                {{-- Modal Tambah --}}
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <button type="button" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal"
                        data-target="#exampleModal" id="#myBtn">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data Klinik</span>
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Klinik</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="addKlinik" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_klinik">Nama Klinik</label>
                                            <input type="text" class="form-control" id="nama_klinik" name="nama_klinik"
                                                placeholder="Masukan nama klinik">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                placeholder="Masukan alamat">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat"
                                                rows="2"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                                placeholder="Masukan deskripsi">
                                        </div>
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <input type="text" class="form-control" id="logo" name="logo"
                                                placeholder="Masukan logo">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger"
                                            data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                {{-- Akhir Modal Tambah --}}

                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama Klinik</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                                <th>Deskripsi</th>
                                <th>Logo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
@endsection