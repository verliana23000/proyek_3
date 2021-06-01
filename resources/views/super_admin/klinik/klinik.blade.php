@extends('layout.asset_super_admin.master')
@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Klinik</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/index')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard Klinik</li>
        </ol>
    </div>

    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Klinik</h6>
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
                    <tbody>

                                <form action="addKlinik" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_klinik">Nama Klinik</label>
                                            <input type="text" class="form-control" id="nama_klinik" name="nama_klinik"
                                                placeholder="Masukan nama Klinik">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                placeholder="Masukan alamat">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">No Hp</label>
                                            <input type="numerik" class="form-control" id="no_hp" name="no_hp"
                                                placeholder="Masukan No Hp"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Masukan Email"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Masukan Password"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                                placeholder="Masukan Deskripsi"></textarea>
                                        </div>
                                        <label>Logo</label>
                                        <div class="custom-file">
                                        <input type="file" name="logo" id="logo">
                                        <br><label class="text-primary" for="logo">* Ukuran Maksimal 2 Mb</label>
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
                                <th>Email</th>
                                <th>Deskripsi</th>
                                <th>Logo</th>
                                <th>Validasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$data->nama_klinik}}</td>
                                <td>{{$data->alamat}}</td>
                                <td>{{$data->no_hp}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->deskripsi}}</td>
                                <td><img width="150px" src="{{ asset('admin/img/logo/'.$data->logo) }}"></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#detailProduk{{$data->id_klinik}}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <form action="{{url('deleteKlinik', $data->id_klinik)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>
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
        <!-- @foreach ($datas as $data)

        {{-- Modal edit --}}

        <div class="modal fade" id="edit-data-{{$data->id_klinik}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Klinik</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{url('editKlinik', $data->id_klinik)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_klinik">Nama Klinik</label>
                                <input type="text" class="form-control" id="nama_klinik" name="nama_klinik"
                                    value="{{$data->nama_klinik}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{$data->alamat}}">
                            </div>

                            <div class="form-group">
                                <label for="no_hp">No Hp</label>
                                <input type="numeric" class="form-control" id="no_hp" name="no_hp" value="{{$data->no_hp}}">
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi"
                                    rows="2">{{$data->deskripsi}}</textarea>
                            </div>
                            <label>Logo</label><br>
                            <img width="150px" src="{{ url('admin/img/gambar_produk/logo/'.$data->logo) }}">
                            <div class="custom-file"><br>
                            <input type="file" name="logo" id="logo">
                            <br><label class="text-primary" for="logo">* Ukuran Maksimal 2 Mb<br>
                            * Dikosongkan jika tidak dirubah</label>
                             </div>
                            @if ($errors->has('logo'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('logo') }}</p></span>
                            @endif
                            </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </form>
    {{-- Akhir Modal Edit --}}
@endforeach -->
   
   <!-- Modal Detail -->
                            @foreach($detail as $klinik)
                            <div class="modal fade" tabindex="-1" role="dialog" id="detailProduk{{$klinik->id_klinik}}" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">List Produk {{ $klinik->nama_klinik }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered table-hover table-responsive-lg example1">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Jenis Produk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($detail as $produks)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$produks->nama_produk}}</td>
                                        <td>{{$produks->jenis_produk}}</td>
                                        <td>{{$produks->harga_produk}}</td>
                                        <td>{{$produks->stok}}</td>
                                        <td><img width="150px" src="{{asset('admin/img/gambar_produk/'.$produks->gambar)}}"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                                </div>
                                </div>
                                </div>
                                </div>
        @endforeach

@endsection