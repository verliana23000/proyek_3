@extends('layout.master')
@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Pembayaran Treatment</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/index')}}">Home</a></li>
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

              <!--   {{-- Modal Tambah --}}
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <button type="button" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal"
                        data-target="#exampleModal" id="#myBtn">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data Pemesanan Produk</span>
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pemesanan Produk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="addProduk" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_member">Nama Member</label>
                                            <input type="text" class="form-control" id="nama_member" name="nama_member"
                                                placeholder="Masukan nama member">
                                   </div>

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_produk">Nama Produk</label>
                                            <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                                placeholder="Masukan nama produk">
                                        </div>

                                        <div class="form-group">
                                            <label for="jenis_produk">Jenis Produk</label>
                                            <input type="text" class="form-control" id="alamat" name="jenis_produk"
                                                placeholder="Masukan jenis produk">
                                        </div>

                                        <div class="form-group">
                                            <label for="harga_produk">Harga</label>
                                            <input type="numeric" class="form-control" id="harga" name="harga_produk"
                                                placeholder="Masukan harga produk"></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="stok">Stok</label>
                                            <input type="numeric" class="form-control" id="stok" name="stok"
                                                placeholder="Masukan stok"></textarea>
                                        </div>
                                        <label>Gambar</label>
                                        <div class="custom-file">
                                        <input type="file" name="gambar" id="gambar">
                                        <br><label class="text-primary" for="gambar">* Ukuran maksimal 2 Mb</label>
                                      </div>
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
                </div> -->
               <!--  </form>

                {{-- Akhir Modal Tambah --}} -->

                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama Member</th>
                                <th>Nominal</th>
                                <th>Upload Bukti Pembayaran</th>
                                <th>Validasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <th>{{$data->nama_member}}</th>
                                <td>@rupiah($data->nominal)</td>
                                <td>{{$data->bukti_tf}}</td>
                                <td>{{$data->status}}</td>
                                <td><img width="150px" src="{{url('admin/image/produk/'.$data->gambar)}}"></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#edit-data-{{$data->id_pembayaran_produk}}">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <form action="{{url('deletePembayaran_produk', $data->id_pembayaran_produk)}}" method="POST" class="d-inline">
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

        <!-- @foreach ($datas as $data)
        {{-- Modal edit --}}
        <div class="modal fade" id="edit-data-{{$data->id_produk}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Klinik</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{url('editPemesanan_produk', $data->id_pp)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    value="{{$data->nama_produk}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="jenis_produk">Jenis Produk</label>
                                <input type="text" class="form-control" id="jenis_produk" name="jenis_produk" value="{{$data->jenis_produk}}">
                            </div>

                            <div class="form-group">
                                <label for="harga_produk">Harga</label>
                                <input type="text" class="form-control" id="harga_produk" name="harga_produk" value="{{$data->harga_produk}}">
                            </div>

                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <textarea class="form-control" id="stok" name="stok"
                                    rows="2">{{$data->stok}}</textarea>
                            </div>
                            <label>Gambar</label><br>
                            <img width="150px" src="{{ url('admin/image/gambar/'.$data->gambar) }}">
                            <div class="custom-file"><br>
                            <input type="file" name="gambar" id="gambar">
                            <br><label class="text-primary" for="gambar">* Ukuran Maksimal 2 Mb<br>
                            * Dikosongkan jika tidak dirubah</label>
                             </div>
                            @if ($errors->has('gambar'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('gambar') }}</p></span>
                            @endif
                            </div>

                            <div class="form-group">
                                <label for="klinik">Klinik</label>
                                <select class="select2-single-placeholder form-control" name="klinik" id="klinik">
                                    @foreach ($kliniks as $item)
                                    <option value="{{$item->id_klinik}}">{{$item->nama_klinik}}</option>
                                    @endforeach
                                </select>
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
    {{-- Akhir Modal Tambah --}} -->
@endforeach
@endsection