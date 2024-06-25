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
            <div class="d-flex justify-content-between mb-3 align-items-center">
                <div>
                    <h2><b>Disposisi</b></h2>
                </div>
                <div>
                    <a href="{{ route('kepala.disposisi.create', ['id' => $suratMasuk->id]) }}" class="btn btn-danger">+ Tambah Disposisi</a>
                </div>
            </div>
            <div class="alert alert-secondary alert-dismissible fade show p-4" role="alert" >
                <div class="d-flex align-items-center">
                         <i class="material-icons-outlined me-3">Nomor Surat: {{ $suratMasuk->nomor_surat }}</i>
                </div>
            </div>
            <!-- Card Layout -->
            <div class="row">
                @foreach ($disposisi as $disposisiItem)
                <div class="col-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title mb-0">Tujuan: {{ $disposisiItem->tujuan }}</h5>
                                <div class="d-flex align-items-center">
                                    <small class="text-muted me-3">Batas Waktu: {{ $disposisiItem->batas_waktu }}</small>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="{{ route('kepala.disposisi.edit', ['id' => $disposisiItem->id]) }}">Edit</a></li>
                                            <li>
                                                <form action="{{ route('kepala.disposisi.destroy', ['id' => $disposisiItem->id]) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item">Hapus</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                            </div>
                            </div>                            
                            <hr>
                            <p class="card-text"><strong>Isi Disposisi:</strong> {{ $disposisiItem->isi }}</p>
                            <p class="card-text"><strong>Sifat Status:</strong> {{ $disposisiItem->sifat}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
