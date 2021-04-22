@extends('layout.master')
@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Member</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/index')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard Member</li>
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
                        <span class="text">Tambah Data Member</span>
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Member</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="addMember" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_member">Nama Member</label>
                                            <input type="text" class="form-control" id="nama_member" name="nama_member"
                                                placeholder="Masukan nama Member">
                                        </div>
                                        <div class="form-group">
                                            <label for="ttl">TTL</label>
                                            <input type="date" class="form-control" id="ttl" name="ttl"
                                                placeholder="Masukan ttl">
                                        </div>

                                        <label>Jenis Kelamin</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jk" id="jk"
                                                value="laki-laki">
                                            <label class="form-check-label" for="jk">Laki - Laki</label><br>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jk" id="jk"
                                                value="perempuan">
                                            <label class="form-check-label" for="jk">Perempuan</label>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="no_hp">No Hp</label>
                                            <input type="numerik" class="form-control" id="no_hp" name="no_hp"
                                                placeholder="Masukan No Hp"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                placeholder="Masukan Email"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" class="form-control" id="password" name="password"
                                                placeholder="Masukan Password">
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
                                <th>Nama Member</th>
                                <th>TTL</th>
                                <th>Jenis Kelamin</th>
                                <th>No Hp</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Klinik</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$data->nama_member}}</td>
                                <td>{{$data->ttl}}</td>
                                <td>{{$data->jk}}</td>
                                <td>{{$data->no_hp}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->password}}</td>
                                <td>{{$data->id_klinik}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#edit-data-{{$data->id_member}}">
                                        <i class="fas fa-user-edit"></i>
                                    </button>
                                    <form action="{{url('deleteMember', $data->id_member)}}" method="POST" class="d-inline">
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
        <div class="modal fade" id="edit-data-{{$data->id_member}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Member</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{url('editadminklinik', $data->id_member)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_member">Nama Member</label>
                                <input type="text" class="form-control" id="nama_member" name="nama_member"
                                    value="{{$data->nama_member}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="ttl">TTL</label>
                                <input type="text" class="form-control" id="ttl" name="ttl" value="{{$data->ttl}}">
                            </div>

                            <label>Jenis Kelamin</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk1" value="laki-laki"
                                    {{ ($data->jk=="laki-laki")? "checked" : "" }}>
                                <label class="form-check-label" for="jk">Laki - Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk2" value="perempuan"
                                    {{ ($data->jk=="perempuan")? "checked" : "" }}>
                                <label class="form-check-label" for="jk">Perempuan</label>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="no_hp">No Hp</label>
                                <input type="numerik" class="form-control" id="no_hp" name="no_hp" value="{{$data->no_hp}}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <textarea class="form-control" id="email" name="email"
                                    rows="2">{{$data->email}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <textarea class="form-control" id="password" name="password"
                                    rows="2">{{$data->password}}</textarea>
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