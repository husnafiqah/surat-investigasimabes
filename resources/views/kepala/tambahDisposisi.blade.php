@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

@section('content')
<div class="wrapper">
    <!-- sidebar -->
    <div class="sidebar" data-color="red">
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li class="">
                    <a href="{{ route('kepala.home') }}">
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="">
                    <a class="nav-link" data-bs-toggle="collapse" href="#transaksi-collapse" aria-expanded="true">
                        <span class="arrow">Data Surat</span>
                    </a>
                    <ul class="nav collapse ms-3 flex-column" id="transaksi-collapse" data-bs-parent="#menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kepala.transaksiSM')}}" aria-current="page">Surat Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kepala.transaksiSK')}}" aria-current="page">Surat Keluar</a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a class="nav-link " data-bs-toggle="collapse" href="#buku-collapse" aria-expanded="true">
                        <span class="arrow">Buku Agenda</span>
                    </a>
                    <ul class="nav collapse ms-3 flex-column" id="buku-collapse" data-bs-parent="#menu">
                        <li class="">
                            <a class="nav-link" href="{{ route('kepala.bukuSM')}}" aria-current="page">Surat Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kepala.bukuSK')}}" aria-current="page">Surat Keluar</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- main content -->
    <div class="main-panel">
        <div class="container" style="padding-left: 30px; padding-right: 30px;">
            <h2><b>Tambah Disposisi</b></h2>
            <div class="row">
                <div class="col-md-6">
                    <!-- Form untuk membuat surat (sebelah kiri) -->
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('kepala.storeDisposisi', $suratMasuk->id) }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="tujuan" class="form-label">Tujuan</label>
                                    <input type="text" name="tujuan" class="form-control" id="tujuan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="batasWaktu" class="form-label">Batas Waktu</label>
                                    <input type="date" name="batas_waktu" class="form-control" id="batas_waktu" required>
                                </div>
                                <div class="mb-3">
                                    <label for="isi" class="form-label">Isi Disposisi</label>
                                    <textarea class="form-control" name="isi" id="isi" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="sifat">Sifat Status</label>
                                    <select class="form-control" id="sifat" name="sifat" required>
                                        <option>Rahasia</option>
                                        <option>Segera</option>
                                        <option>Biasa</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
