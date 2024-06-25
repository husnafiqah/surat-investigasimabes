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
                <li class="active">
                    <a class="nav-link " data-bs-toggle="collapse" href="#transaksi-collapse" aria-expanded="true">
                        <span class="arrow">Data Surat</span>
                    </a>
                    <ul class="nav collapse ms-3 flex-column" id="transaksi-collapse" data-bs-parent="#menu">
                        <li class="active">
                            <a class="nav-link" href="{{ route('admin.transaksiSM') }}" aria-current="page">Surat Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.transaksiSK') }}" aria-current="page">Surat Keluar</a>
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
                        <p>Data Pengguna</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- main content -->
    <div class="main-panel">
        <div class="container" style="padding-left: 30px; padding-right: 30px; ">
            <h2><b>Tambah Surat Masuk</b></h2>
            <div class="card">
                <div class="card-body">
                <form method="POST" action="{{ route('simpanSuratMasuk') }}" enctype="multipart/form-data" style="padding-left: 10px; padding-right: 10px; ">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pengirim" class="form-label">Pengirim</label>
                            <input type="text" name="pengirim" class="form-control" id="pengirim" required>
                        </div>
                        <div class="mb-3">
                            <label for="noSurat" class="form-label">No Surat</label>
                            <input type="text" name="noSurat" class="form-control" id="noSurat" required>                        </div>
                        <div class="mb-3">
                            <label for="perihal" class="form-label">Perihal</label>
                            <input type="text" name="perihal" class="form-control" id="perihal" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggalSurat" class="form-label">Tanggal Surat</label>
                            <input type="date" name="tanggalSurat" class="form-control" id="tanggalSurat" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalDiterima" class="form-label">Tanggal Diterima</label>
                            <input type="date" name="tanggalDiterima" class="form-control" id="tanggalDiterima" required>
                        </div>
                        
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">File</label>
                        <input type="file" name="file" class="form-control" id="file" required>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
