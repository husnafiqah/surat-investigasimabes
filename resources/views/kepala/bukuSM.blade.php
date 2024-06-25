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
                <li class="active">
                    <a class="nav-link " data-bs-toggle="collapse" href="#buku-collapse" aria-expanded="true">
                        <span class="arrow">Buku Agenda</span>
                    </a>
                    <ul class="nav collapse ms-3 flex-column" id="buku-collapse" data-bs-parent="#menu">
                        <li class="active">
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
            <h2><b>Buku Agenda - Surat Masuk</b></h2>
            <div class="card">
                <div class="card-body">
                    <div style="padding-bottom: 20px; padding-top: 10px">
                        <form action="{{ route('kepala.bukuSM') }}" method="GET" class="d-flex align-items-center">
                            <input type="date" name="dari_tanggal" class="form-control me-2" style="width: 140px;" value="{{ request()->query('dari_tanggal') }}">
                            <input type="date" name="sampai_tanggal" class="form-control me-2" style="width: 140px;" value="{{ request()->query('sampai_tanggal') }}">
                            <button class="btn btn-outline-success me-2" type="submit">Cari</button>
                            <button class="btn btn-outline-success" type="button" onclick="window.location.href='{{ route('kepala.bukuSM.export', ['dari_tanggal' => request()->query('dari_tanggal'), 'sampai_tanggal' => request()->query('sampai_tanggal')]) }}'">Export</button>
                        </form>
                    </div> 
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.Agenda</th>
                                <th scope="col">Pengirim</th>
                                <th scope="col">No.Surat</th>
                                <th scope="col">Tanggal Surat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suratMasuks as $suratMasuk)
                            <tr>
                                <td>{{ $suratMasuk->id }}</td>
                                <td>{{ $suratMasuk->pengirim }}</td>
                                <td>{{ $suratMasuk->nomor_surat }}</td>
                                <td>{{ $suratMasuk->tanggal_surat }}</td>
                            </tr>
                            @endforeach
                            <!-- Tambahkan baris lain sesuai kebutuhan -->
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
