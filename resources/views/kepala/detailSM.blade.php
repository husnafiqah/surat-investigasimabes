@extends('layouts.app')

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
                        <li class="nav-item">
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
        <div class="container" style="padding-left: 30px; padding-right: 30px; ">
            <h2><b>Detail Surat</b></h2>
            <div class="row">
                <div class="col-xxl-6">
                <div>
                    <div class="card">
                        <div class="card-header">Detail Surat</div>
                        <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nomor Surat</th>
                                    <td>{{ $suratMasuk->nomor_surat  }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Surat</th>
                                    <td>{{ $suratMasuk->tanggal_surat }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Diterima</th>
                                    <td>{{ $suratMasuk->tanggal_diterima }}</td>
                                </tr>
                                <tr>
                                    <th>Perihal</th>
                                    <td>{{ $suratMasuk->perihal }}</td>
                                </tr>
                                <tr>
                                    <th>Pengirim Surat</th>
                                    <td>{{ $suratMasuk->pengirim  }}</td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>{{ $suratMasuk->keterangan }}</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>                        
                    </div>
                </div>
                </div>
                <div class="col-xxl-6">
                <div>
                    <div class="card mb-4">
                        <div class="card-header">
                            File Surat
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <embed src="{{ Storage::url($suratMasuk->file) }}" width="500" height="400" type="application/pdf">
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
