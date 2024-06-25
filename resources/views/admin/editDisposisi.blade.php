@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

@section('content')
<div class="wrapper">
    <!-- sidebar -->
    <div class="sidebar" data-color="red">
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li class="">
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
                            <a class="nav-link" href="{{ route('admin.transaksiSM')}}" aria-current="page">Surat Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.transaksiSK')}}" aria-current="page">Surat Keluar</a>
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
                <li>
                    <a href={{ route('pengguna')}}>
                        <p>Data Pengguna</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- main content -->
    <div class="main-panel">
        <div class="container" style="padding-left: 30px; padding-right: 30px;">
            <h2><b>Edit Disposisi</b></h2>
            <div class="row">
                <div class="col-md-6">
                    <!-- Form untuk membuat surat (sebelah kiri) -->
                    <div class="card">
                        <div class="card-body">
                        <form action="{{ route('admin.disposisi.update', ['id' => $disposisi->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="tujuan" class="form-label">Tujuan</label>
                                <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ $disposisi->tujuan }}">
                            </div>

                            <div class="mb-3">
                                <label for="isi" class="form-label">Isi Disposisi</label>
                                <textarea class="form-control" id="isi" name="isi">{{ $disposisi->isi }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="batas_waktu" class="form-label">Batas Waktu</label>
                                <input type="date" class="form-control" id="batas_waktu" name="batas_waktu" value="{{ $disposisi->batas_waktu }}">
                            </div>

                            <div class="mb-3">
                                <label for="sifat" class="form-label">Sifat</label>
                                <input type="text" class="form-control" id="sifat" name="sifat" value="{{ $disposisi->sifat }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Perbarui</button>
                            <a href="{{ route('admin.disposisi', ['id' => $disposisi->surat_masuk_id]) }}" class="btn btn-secondary">Batal</a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
