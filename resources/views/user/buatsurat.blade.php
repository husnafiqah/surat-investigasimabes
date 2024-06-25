@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

@section('content')
<div class="wrapper">
    <!-- sidebar -->
    <div class="sidebar" data-color="red">
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li class="">
                    <a href="{{ route('home') }}">
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="{{ route('user.buatsurat') }}">
                        <p>Buat Surat</p>
                    </a>
                </li>
                <li class="">
                    <a class="nav-link " data-bs-toggle="collapse" href="#transaksi-collapse" aria-expanded="true">
                        <span class="arrow">Data Surat</span>
                    </a>
                    <ul class="nav collapse ms-3 flex-column" id="transaksi-collapse" data-bs-parent="#menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.transaksiSM')}}" aria-current="page">Surat Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.transaksiSK')}}" aria-current="page">Surat Keluar</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a class="nav-link " data-bs-toggle="collapse" href="#buku-collapse" aria-expanded="true">
                        <span class="arrow">Buku Agenda</span>
                    </a>
                    <ul class="nav collapse ms-3 flex-column" id="buku-collapse" data-bs-parent="#menu">
                        <li class="">
                            <a class="nav-link" href="{{ route('user.bukuSM')}}" aria-current="page">Surat Masuk</a>
                        </li>
                        <li class="">
                            <a class="nav-link" href="{{ route('user.bukuSK')}}" aria-current="page">Surat Keluar</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- main content -->
    <div class="main-panel">
        <div class="container" style="padding-left: 30px; padding-right: 30px;">
            <h2><b>Buat Surat</b></h2>
            <div class="row">
                <div class="col-md-6">
                    <!-- Form untuk membuat surat (sebelah kiri) -->
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.simpanSurat') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="tujuan" class="form-label">Tujuan</label>
                                    <input type="text" name="tujuan" class="form-control" id="tujuan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="perihal" class="form-label">Perihal</label>
                                    <input type="text" name="perihal" class="form-control" id="perihal" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nomorSurat" class="form-label">Nomor Surat</label>
                                    <input type="text" name="nomor_surat" class="form-control" id="nomorSurat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggalSurat" class="form-label">Tanggal Surat</label>
                                    <input type="date" name="tanggalSurat" class="form-control" id="tanggalSurat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="isi" class="form-label">Isi</label>
                                    <textarea class="form-control" name="isi" id="isi" rows="5"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Buat Surat</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
