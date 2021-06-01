@extends('layout.master')
@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Treatment</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/index')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard Treatment</li>
        </ol>
    </div>

    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Treatment</h6>
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
                        <span class="text">Tambah Data Treatment</span>
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Treatment</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="addTreatment" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_treatment">Nama Treatment</label>
                                            <input type="text" class="form-control" id="nama_treatment" name="nama_treatment"
                                                placeholder="Masukan nama treatment">
                                        </div>

                                        <div class="form-group">
                                            <label for="jenis_treatment">Jenis Treatment</label>
                                            <input type="text" class="form-control" id="alamat" name="jenis_treatment"
                                                placeholder="Masukan jenis treatment">
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_treatment">Harga</label>
                                            <input type="numeric" class="form-control" id="harga" name="harga_treatment"
                                                placeholder="Masukan harga treatment"></textarea>
                                        </div>
                                        <label>Gambar</label>
                                        <div class="custom-file">
                                        <input type="file" name="gambar" id="gambar">
                                        <br><label class="text-primary" for="gambar">* Ukuran maksimal 2 Mb</label>
                                        </div>
                                            <label for="klinik">Klinik</label>
                                            <select class="select2-single-placeholder form-control" 
                                              name="klinik" id="klinik" style="width: 100%">
                                            <option value="">Pilih Klinik</option>  
                                            @foreach ($kliniks as $klinik)
                                            <option value="{{$klinik->id_klinik}}">{{ ($klinik->nama_klinik) }}
                                            </option>
                                            @endforeach
                                            </select>
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
                                <th>Nama Treatment</th>
                                <th>Jenis Treatment</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Klinik</th>
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
                                <td>{{$data->nama_treatment}}</td>
                                <td>{{$data->jenis_treatment}}</td>
                                <td>@rupiah($data->harga_treatment)</td>
                                <td><img width="150px" src="{{url('admin/img/gambar_produk/gambar_treatment/'.$data->gambar)}}"></td>
                                <td>{{$data->klinik->nama_klinik}}</td>                              
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#edit-data-{{$data->id_treatment}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <form action="{{url('deleteTreatment', $data->id_treatment)}}" method="POST" class="d-inline">
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

        @foreach ($datas as $data)
        {{-- Modal edit --}}
        <div class="modal fade" id="edit-data-{{$data->id_treatment}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Klinik</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{url('editTreatment', $data->id_treatment)}}" method="post">

                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_treatment">Nama Treatment</label>
                                <input type="text" class="form-control" id="nama_treatment" name="nama_treatment"
                                    value="{{$data->nama_treatment}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="jenis_treatment">Jenis Treatment</label>
                                <input type="text" class="form-control" id="jenis_treatment" name="jenis_treatment" value="{{$data->jenis_treatment}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="harga_treatment">Harga</label>
                                <input type="text" class="form-control" id="harga_treatment" name="harga_treatment" value="{{$data->harga_treatment}}">
                            </div>

                            <label>Gambar</label><br>
                            <img width="150px" src="{{ url('admin/img/gambar_treatment/'.$data->gambar) }}">
                            <div class="custom-file"><br>
                            <input type="file" name="gambar" id="gambar">
                            <br><label class="text-primary" for="gambar">* Ukuran Maksimal 2 Mb<br>
                            * Dikosongkan jika tidak dirubah</label>
                             </div>

                            <div class="form-group">
                                <label for="klinik">Klinik</label>
                                <input type="text" class="form-control" id="klinik" name="klinik"
                                    value="{{$data->nama_klinik}}" readonly>
                            </div>
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
    {{-- Akhir Modal Tambah --}}
@endforeach
@endsection