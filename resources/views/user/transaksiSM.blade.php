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
                        <li class="active">
                            <a class="nav-link" href="{{ route('user.transaksiSM') }}" aria-current="page">Surat Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.transaksiSK') }}" aria-current="page">Surat Keluar</a>
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
        <div class="container" style="padding-left: 30px; padding-right: 30px;">
            <h2><b>Daftar Surat Masuk</b></h2>
            <div class="card">
                <div class="card-body">
                    <div class="mb-3" style="padding-bottom: 20px; padding-top: 10px">
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="{{ route('user.tambahSM') }}" class="btn btn-danger me-2">+ Tambah Data</a>
                                <!-- <a class="btn btn-outline-success me-2">Export</a> -->
                            </div>
                            <form class="d-flex align-items-center" action="{{ route('user.transaksiSM') }}" method="GET" class="form-inline">
                                <input type="text" name="search" class="form-control me-2" placeholder="Cari...">
                                <button class="btn btn-outline-success">Cari</button>
                            </form>
                        </div>
                    </div>  
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Status</th>
                                <th scope="col">No.Agenda</th>
                                <th scope="col">Pengirim</th>
                                <th scope="col">No.Surat</th>
                                <th scope="col">Tanggal Surat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($suratMasuks as $suratMasuk)
                            <tr>
                                <th>
                                    <span class="badge rounded-pill text-bg-{{ $suratMasuk->status == 'Menunggu' ? 'warning' : ($suratMasuk->status == 'terdisposisi' ? 'success' : 'secondary')   }}">
                                        {{ ucfirst($suratMasuk->status) }}
                                    </span>
                                </th>
                                <td>{{ $suratMasuk->id }}</td>
                                <td>{{ $suratMasuk->pengirim }}</td>
                                <td>{{ $suratMasuk->nomor_surat }}</td>
                                <td>{{ $suratMasuk->tanggal_surat }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <form class="me-1">
                                            <a href="{{ route('user.disposisi', $suratMasuk->id) }}" type="button" class="btn btn-primary btn-sm" >Disposisi</a>
                                        </form>
                                        <form class="me-1">
                                            <a href="{{ route('user.detailSM', $suratMasuk->id) }}" type="button" class="btn btn-secondary">
                                                <i class="bi bi-info-circle"></i>
                                            </a>
                                        </form>    
                                        @if ($suratMasuk->status != 'terdisposisi')
                                            <form class="me-1">
                                                <a href="{{ route('user.editSM', $suratMasuk->id) }}" type="button" class="btn btn-warning">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>  
                                             </form>                                  
                                            <form action="{{ route('user.deleteSM', $suratMasuk->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        @endif
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end" style="padding-top: 20px;">
                            <li class="page-item disabled">
                            <a class="page-link">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
