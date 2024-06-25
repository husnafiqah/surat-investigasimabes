<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

</html>
<body>
<div id="sidebar" class="wrapper">
    <!-- sidebar -->
    <div class="sidebar" data-color="red">
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li class="">
                    <a href="{{ route('admin.home') }}">
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a class="nav-link " data-bs-toggle="collapse" href="#transaksi-collapse" aria-expanded="true">
                        <span class="arrow">Transaksi Surat</span>
                    </a>
                    <ul class="nav collapse ms-3 flex-column" id="transaksi-collapse" data-bs-parent="#menu">
                        <li class="">
                            <a class="nav-link" href="{{ route('admin.transaksiSM')}}" aria-current="page">Surat Masuk</a>
                        </li>
                        <li class="active">
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
                <li class="">
                    <a href={{ route('pengguna')}}>
                        <p>Pengguna</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
