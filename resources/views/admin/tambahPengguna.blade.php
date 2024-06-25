@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

@section('content')
<div class="wrapper">
    <!-- sidebar -->
    <div class="sidebar" data-color="red">
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <a href="{{ route('admin.home') }}">
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('admin.buatsurat') }}">
                        <p>Buat Surat</p>
                    </a>
                </li>
                <li class="">
                    <a class="nav-link " data-bs-toggle="collapse" href="#transaksi-collapse" aria-expanded="true">
                        <span class="arrow">Data Surat</span>
                    </a>
                    <ul class="nav collapse ms-3 flex-column" id="transaksi-collapse" data-bs-parent="#menu">
                        <li class="nav-item">
                            <a class="nav-link" href="#" aria-current="page">Surat Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" aria-current="page">Surat Keluar</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a class="nav-link " data-bs-toggle="collapse" href="#buku-collapse" aria-expanded="true">
                        <span class="arrow">Buku Agenda</span>
                    </a>
                    <ul class="nav collapse ms-3 flex-column" id="buku-collapse" data-bs-parent="#menu">
                        <li class="">
                            <a class="nav-link" href="{{ route('admin.bukuSM')}}" aria-current="page">Surat Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.bukuSK')}}" aria-current="page">Surat Keluar</a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href={{ route('pengguna')}}>
                        <p>Data Pengguna</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- main content -->
    <div class="main-panel">
        <div class="container" style="padding-left: 30px; padding-right: 30px; ">
            <h2><b>Tambah Pengguna</b></h2>
            <div class="card">
                <div class="card-body">
                <form method="POST" action="{{ route('simpanPengguna') }}" style="padding-left: 10px; padding-right: 10px;">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="name" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan:</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirm Password:</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirm Password" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                            <option value="2">Kepala</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
