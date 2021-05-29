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

                      @foreach($datas as $data)
                            <img width="150px" src="{{ url('admin/img/logo/'.$data->logo) }}">
                        </td>
                        <td>{{$data->nama_klinik}}</td>
                        <td>
                        {{$data->alamat}}
                        </td>
                        <td>{{$data->no_hp}}</td>
                        <td>{{$data->deskripsi}}</td>
                        <td>
                          <a href="/admin/edit_data{$data->id}}" class="btn btn-warning">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                          <a href="/admin/klinik{{$data->id_klinik}}" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                      @endforeach 

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
                                <th>Deskripsi</th>
                                <th>Logo</th>
                                <th>Detail</th>
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
                                <td>{{$data->deskripsi}}</td>
                                <td><img width="150px" src="{{ url('admin/img/logo/'.$data->logo) }}"></td>

                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#detailTreatment{{$data->id_klinik}}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#edit-data-{{$data->id_klinik}}">
                                        <i class="fas fa-user-edit"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @foreach ($datas as $data)

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
@endforeach
   
   <!-- Modal Detail -->
                            @foreach($datas as $klinik)
                            <div class="modal fade" tabindex="-1" role="dialog" id="detailTreatment{{$klinik->id_klinik}}" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">List Produk dan Treatment {{ $klinik->nama_klinik }}</h5>
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
                                    @foreach($klinik->produk as $produk)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$produk->nama_produk}}</td>
                                        <td>{{$produk->jenis_produk}}</td>
                                        <td>{{$produk->harga_produk}}</td>
                                        <td>{{$produk->stok}}</td>
                                        <td><img width="150px" src="{{asset('admin/img/gambar_produk/'.$produk->gambar_produk)}}"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
        @endforeach

<!-- Modal Detail -->
@foreach($datas as $klinik)
            <div class="modal fade" tabindex="-1" role="dialog" id="detailTreatment{{$klinik->id_klinik}}" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">List Treatment {{ $klinik->nama_klinik }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered table-hover table-responsive-lg example1">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Treatment</th>
                                        <th>Jenis Treatment</th>
                                        <th>Harga</th>
                                        <th>Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($klinik->treatment as $treatment)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$treatment->nama_treatment}}</td>
                                        <td>{{$treatment->jenis_treatment}}</td>
                                        <td>{{$treatment->harga_treatment}}</td>
                                        <td><img width="150px" src="{{url('admin/img/gambar_produk/gambar_treatment/'.$data->gambar_produk)}}"></td>
                                    </tr>
                                    @endforeach
                                </tbody>                 
@endforeach
@endsection