<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::id();

        $jumlahSuratMasuk = SuratMasuk::where('user_id', $userId)->count();
        $jumlahSuratKeluar = SuratKeluar::count();

        return view('user.home', compact('jumlahSuratMasuk', 'jumlahSuratKeluar'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $jumlahSuratMasuk = SuratMasuk::count();
        $jumlahSuratKeluar = SuratKeluar::count();
        $jumlahPengguna = User::count();

        return view('admin.home', compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPengguna'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function kepalaHome()
    {
            // Mengambil data surat masuk yang statusnya "Terdisposisi"
        $terdisposisiCount = SuratMasuk::where('status', 'terdisposisi')->count();

        // Mengambil data surat masuk yang statusnya "Menunggu"
        $menungguCount = SuratMasuk::where('status', 'menunggu')->count();

        return view('kepala.home', compact('terdisposisiCount', 'menungguCount'));
    }
    
}
