<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SuratKeluar;
use Illuminate\Support\Facades\Storage;
use App\Exports\SuratKeluarExport;
use Maatwebsite\Excel\Facades\Excel;

class SuratKeluarController extends BaseController
{

    public function admintransaksiSK()
    {
        $suratKeluar = SuratKeluar::paginate(10);
        return view('admin.transaksiSK', compact('suratKeluar'));
    }
    public function adminbukuSK(Request $request)
    {
        $dariTanggal = $request->query('dari_tanggal');
        $sampaiTanggal = $request->query('sampai_tanggal');

        $suratKeluar = SuratKeluar::when($dariTanggal && $sampaiTanggal, function ($query) use ($dariTanggal, $sampaiTanggal) {
                return $query->whereBetween('tanggal_surat', [$dariTanggal, $sampaiTanggal]);
            })
            ->paginate(10);

        return view('admin.bukuSK', compact('suratKeluar'));
    }
    public function admindetailSK($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        return view('admin.detailSK', compact('suratKeluar'));
    }
    public function admintambahSK()
    {
        return view('admin.tambahSK');
    }

    public function adminStore(Request $request)
    {
        // Validate the request
        $request->validate([
            'pengirim' => 'required|string|max:255',
            'noSurat' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'tanggalSurat' => 'required|date',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

         // Handle file upload
         $filePath = null;
         if ($request->hasFile('file')) {
             $filePath = $request->file('file')->store('surat_keluar', 'public');
         }

        // Create the SuratKeluar record
        SuratKeluar::create([
            'nomor_surat' => $request->noSurat,
            'tanggal_surat' => $request->tanggalSurat,
            'tujuan' => $request->tujuan,
            'pengirim' => $request->pengirim,
            'perihal' => $request->perihal,
            'keterangan' => $request->keterangan,
            'user_id' => Auth::id(),
            'file' => $filePath,
        ]);

        return redirect()->route('admin.transaksiSK')->with('success', 'Surat Keluar berhasil ditambahkan');
    }
    public function adminEdit($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        return view('admin.editSK', compact('suratKeluar'));
    }
    public function adminUpdate(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'pengirim' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'noSurat' => 'required|string|max:255',
            'tanggalSurat' => 'required|date',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf|max:10240', // optional file input
        ]);

        // Temukan surat keluar berdasarkan ID
        $suratKeluar = SuratKeluar::findOrFail($id);

        // Update data surat keluar
        $suratKeluar->pengirim = $request->pengirim;
        $suratKeluar->tujuan = $request->tujuan;
        $suratKeluar->perihal = $request->perihal;
        $suratKeluar->nomor_surat = $request->noSurat;
        $suratKeluar->tanggal_surat = $request->tanggalSurat;
        $suratKeluar->keterangan = $request->keterangan;

        // Cek apakah ada file yang diupload
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($suratKeluar->file) {
                Storage::delete($suratKeluar->file);
            }
            // Simpan file baru
            $filePath = $request->file('file')->store('surat_keluar');
            $suratKeluar->file = $filePath;
        }

        // Simpan perubahan
        $suratKeluar->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.transaksiSK')->with('success', 'Surat keluar berhasil diupdate');
    }

    public function adminDelete($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        
        // Delete the file if it exists
        if ($suratKeluar->file) {
            Storage::delete('public/' . $suratKeluar->file);
        }
        
        $suratKeluar->delete();

        return redirect()->route('admin.transaksiSK')->with('success', 'Surat Masuk berhasil dihapus');
    }
    public function usertransaksiSK(Request $request)
    {
        $search = $request->query('search');

        $suratKeluars = SuratKeluar::when($search, function ($query, $search) {
                                return $query->where('id', 'like', '%' . $search . '%')
                                            ->orWhere('tujuan', 'like', '%' . $search . '%')
                                            ->orWhere('nomor_surat', 'like', '%' . $search . '%');
                            })
                            ->orderBy('tanggal_surat', 'desc') // Order by tanggal_surat in descending order
                            ->paginate(10);

        return view('user.transaksiSK', compact('suratKeluars'));
    }
    public function userbukuSK(Request $request)
    {
        $dariTanggal = $request->query('dari_tanggal');
        $sampaiTanggal = $request->query('sampai_tanggal');

        $suratKeluar = SuratKeluar::when($dariTanggal && $sampaiTanggal, function ($query) use ($dariTanggal, $sampaiTanggal) {
                return $query->whereBetween('tanggal_surat', [$dariTanggal, $sampaiTanggal]);
            })
            ->paginate(10);

        return view('user.bukuSK', compact('suratKeluar'));
        
    }
    public function userdetailSK($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        return view('user.detailSK', compact('suratKeluar'));
    }
   

    public function kepalatransaksiSK(Request $request)
    {
        $search = $request->query('search');
    
        $query = SuratKeluar::query();

        if ($search) {
            $query->where('id', 'like', '%' . $search . '%')
                ->orWhere('tujuan', 'like', '%' . $search . '%')
                ->orWhere('nomor_surat', 'like', '%' . $search . '%')
                ->orWhere('tanggal_surat', 'like', '%' . $search . '%');
        }

        $suratKeluar = $query->orderBy('tanggal_surat', 'desc')->paginate(10);

        return view('kepala.transaksiSK', compact('suratKeluar'));
    }
    public function kepaladetailSK($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        return view('kepala\detailSK', compact('suratKeluar'));
    }


    public function kepalabukuSK(Request $request)
    {
        $dariTanggal = $request->query('dari_tanggal');
        $sampaiTanggal = $request->query('sampai_tanggal');

        $suratKeluar = SuratKeluar::when($dariTanggal && $sampaiTanggal, function ($query) use ($dariTanggal, $sampaiTanggal) {
                return $query->whereBetween('tanggal_surat', [$dariTanggal, $sampaiTanggal]);
            })
            ->paginate(10);

        return view('kepala\bukuSK', compact('suratKeluar'));
    }

    public function generateSuratKeluarPDF($id)
    {
        $SuratKeluar = SuratKeluar::findOrFail($id);

        $pdf = PDF::loadView('pdf.suratya', compact('SuratKeluar'));

        return $pdf->stream('surat_keluar_' . $SuratKeluar->nomor_surat . '.pdf');
    }
    public function export(Request $request)
    {
        $dariTanggal = $request->query('dari_tanggal');
        $sampaiTanggal = $request->query('sampai_tanggal');

        return Excel::download(new SuratKeluarExport($dariTanggal, $sampaiTanggal), 'surat_Keluar.xlsx');
    }
}
