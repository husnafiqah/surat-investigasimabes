@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

@section('content')
<div class="wrapper">
    <!-- sidebar -->
    <div class="sidebar" data-color="red">
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <a href="{{ route('home') }}">
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('user.buatsurat') }}">
                        <p>Buat Surat</p>
                    </a>
                </li>
                <li class="active">
                    <a class="nav-link " data-bs-toggle="collapse" href="#transaksi-collapse" aria-expanded="true">
                        <span class="arrow">Data Surat</span>
                    </a>
                    <ul class="nav collapse ms-3 flex-column" id="transaksi-collapse" data-bs-parent="#menu">
                        <li class="">
                            <a class="nav-link" href="#" aria-current="page">Surat Masuk</a>
                        </li>
                        <li class="active">
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
                            <a class="nav-link" href="{{ route('user.bukuSM')}}" aria-current="page">Surat Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.bukuSK')}}" aria-current="page">Surat Keluar</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- main content -->
    <div class="main-panel">
        <div class="container" style="padding-left: 30px; padding-right: 30px; ">
            <h2><b>Detail Surat</b></h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">  
                    <div class="card-header">Detail Surat</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Nomor Surat</th>
                                <td>{{ $suratKeluar->nomor_surat  }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Surat</th>
                                <td>{{ $suratKeluar->tanggal_surat }}</td>
                            </tr>
                            <tr>
                                <th>Tujuan</th>
                                <td>{{ $suratKeluar->tujuan }}</td>
                            </tr>
                            <tr>
                                <th>Perihal</th>
                                <td>{{ $suratKeluar->perihal }}</td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>{{ $suratKeluar->keterangan }}</td>
                            </tr>
                        </table>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            File Surat
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <embed src="{{ Storage::url($suratKeluar->file) }}" width="500" height="375" type="application/pdf">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
    </div>
</div>
@endsection
