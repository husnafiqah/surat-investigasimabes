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
                <li class="">
                    <a href={{ route('pengguna')}}>
                        <p>DataPengguna</p>
                    </a>
                </li>
                <li class="active">
                    <a href="/profile">
                        <p>Profile</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- main content -->
    <div class="main-panel">
        <div class="container" style="padding-left: 30px; padding-right: 30px; ">
            <h2><b>Profile</b></h2>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="card">
                <div class="card-body">
                <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror                
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror                
                </div>
                <div class="form-group mb-3">
                    <label for="jabatan">Jabatan:</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $user->jabatan }}">
                </div>
                    <a href="/profile" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                </div>
            </div>
            <div style="padding-top: 30px"></div>
            <h3><b>Ganti Password</b></h3>
            <div class="card">
                <div class="card-body">
                <form method="POST" action="{{ route('profile.changePassword') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="password_old">Password Lama:</label>
                        <input type="password" class="form-control" id="password_old" name="password_old" required>
                    </div>
                    <div class="form-group  mb-3">
                        <label for="password_new" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="password_new" name="password_new" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_confirmation">Konfirm Password:</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_new_confirmation" required>
                    </div>
                    <a href="/profile" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Ganti Password</button>
                </form>
    </div>
</div>

        </div>
    </div>
</div>
@endsection
