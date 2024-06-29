<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SuratMasuk;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SuratMasukExport;

class SuratMasukController extends BaseController
{
    public function admintransaksiSM(Request $request)
    {
        $search = $request->query('search');

        $suratMasuks = SuratMasuk::when($search, function ($query, $search) {
                                    return $query->where('id', 'like', '%' . $search . '%')
                                                ->orWhere('pengirim', 'like', '%' . $search . '%')
                                                ->orWhere('nomor_surat', 'like', '%' . $search . '%')
                                                ->orWhere('tanggal_surat', 'like', '%' . $search . '%');
                                })
                                ->orderByRaw("FIELD(status, 'menunggu') DESC")
                                ->orderBy('tanggal_surat', 'desc')
                                ->paginate(10);

        return view('admin.transaksiSM', compact('suratMasuks'));
    }

    public function adminbukuSM(Request $request)
    {
        $dariTanggal = $request->query('dari_tanggal');
        $sampaiTanggal = $request->query('sampai_tanggal');

        $suratMasuks = SuratMasuk::when($dariTanggal && $sampaiTanggal, function ($query) use ($dariTanggal, $sampaiTanggal) {
                return $query->whereBetween('tanggal_surat', [$dariTanggal, $sampaiTanggal]);
            })
            ->paginate(10);

        return view('admin.bukuSM', compact('suratMasuks'));
    }
    public function admindetailSM($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return view('admin.detailSM', compact('suratMasuk'));
    }
    public function admintambahSM()
    {
        return view('admin.tambahSM');
    }

    public function adminStore(Request $request)
    {
        // Validate the request
        $request->validate([
            'pengirim' => 'required|string|max:255',
            'noSurat' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'tanggalSurat' => 'required|date',
            'tanggalDiterima' => 'required|date',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('surat_masuks', 'public');
        }

        // Create the SuratMasuk record
        SuratMasuk::create([
            'nomor_surat' => $request->noSurat,
            'tanggal_surat' => $request->tanggalSurat,
            'tanggal_diterima' => $request->tanggalDiterima,
            'pengirim' => $request->pengirim,
            'perihal' => $request->perihal,
            'keterangan' => $request->keterangan,
            'status' => 'Menunggu',
            'user_id' => Auth::id(),
            'file' => $filePath,
        ]);

        // Redirect with success message
        return redirect()->route('admin.transaksiSM')->with('success', 'Surat Masuk berhasil ditambahkan');
    }
    public function adminEdit($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return view('admin.editSM', compact('suratMasuk'));
    }
    public function adminUpdate(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'pengirim' => 'required|string|max:255',
            'nomor_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'tanggal_diterima' => 'required|date',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);
    
        $suratMasuk = SuratMasuk::findOrFail($id);
        $suratMasuk->pengirim = $validatedData['pengirim'];
        $suratMasuk->nomor_surat = $validatedData['nomor_surat'];
        $suratMasuk->tanggal_surat = $validatedData['tanggal_surat'];
        $suratMasuk->tanggal_diterima = $validatedData['tanggal_diterima'];
        $suratMasuk->perihal = $validatedData['perihal'];
        $suratMasuk->keterangan = $validatedData['keterangan'];
    
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($suratMasuk->file) {
                Storage::delete('public/' . $suratMasuk->file);
            }
            // Store new file
            $filePath = $request->file('file')->store('suratMasuk', 'public');
            $suratMasuk->file = $filePath;
        }
    
        $suratMasuk->save();
    
        return redirect()->route('admin.transaksiSM')->with('success', 'Surat Masuk berhasil diupdate');
    }

    public function adminDelete($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        
        // Delete the file if it exists
        if ($suratMasuk->file) {
            Storage::delete('public/' . $suratMasuk->file);
        }
        
        $suratMasuk->delete();

        return redirect()->route('admin.transaksiSM')->with('success', 'Surat Masuk berhasil dihapus');
    }

    public function adminDisposisi($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        $disposisi = Disposisi::where('surat_masuk_id', $id)
                    ->orderBy('created_at', 'desc') // Ubah menjadi 'updated_at' jika diperlukan
                    ->get();

        return view('admin.disposisi', compact('suratMasuk', 'disposisi'));
    }

    public function admin_createDisposisi($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);

        return view('admin.disposisi.create', compact('suratMasuk'));
    }

    public function admin_storeDisposisi(Request $request, $id)
    {
        $request->validate([
            'tujuan' => 'required|string|max:255',
            'isi' => 'required|string',
            'batas_waktu' => 'required|date',
            'sifat' => 'required|string|max:255'
        ]);
    
        $disposisi = new Disposisi();
        $disposisi->surat_masuk_id = $id;
        $disposisi->tujuan = $request->tujuan;
        $disposisi->isi = $request->isi;
        $disposisi->batas_waktu = $request->batas_waktu;
        $disposisi->sifat = $request->sifat;
        $disposisi->save();
    
        // Update status surat menjadi "terdisposisi"
        $suratMasuk = SuratMasuk::findOrFail($id);
        $suratMasuk->status = 'terdisposisi';
        $suratMasuk->save();
    
        return redirect()->route('admin.disposisi', ['id' => $id])->with('success', 'Disposisi berhasil ditambahkan');
    }

    public function admin_editDisposisi($id)
    {
        $disposisi = Disposisi::findOrFail($id);
        return view('admin.editDisposisi', compact('disposisi'));
    }

    public function admin_updateDisposisi(Request $request, $id)
    {
        $request->validate([
            'tujuan' => 'required|string|max:255',
            'isi' => 'required|string',
            'batas_waktu' => 'required|date',
            'sifat' => 'required|string|max:255'
        ]);

        $disposisi = Disposisi::findOrFail($id);
        $disposisi->tujuan = $request->tujuan;
        $disposisi->isi = $request->isi;
        $disposisi->batas_waktu = $request->batas_waktu;
        $disposisi->sifat = $request->sifat;
        $disposisi->save();

        return redirect()->route('admin.disposisi', ['id' => $disposisi->surat_masuk_id])
            ->with('success', 'Disposisi berhasil diperbarui');
    }

    public function admin_destroyDisposisi($id)
    {
        $disposisi = Disposisi::findOrFail($id);
        $suratMasukId = $disposisi->surat_masuk_id; // Simpan id surat masuk sebelum dihapus
        $disposisi->delete();

        return redirect()->route('admin.disposisi', ['id' => $suratMasukId])
            ->with('success', 'Disposisi berhasil dihapus');
    }

    public function download_SM($id)
    {
        $suratMasuk  = SuratMasuk::findOrFail($id);

        return Storage::download($suratMasuk->file);
    }

    public function usertransaksiSM(Request $request)
    {
        $search = $request->query('search');

        $suratMasuks = SuratMasuk::when($search, function ($query, $search) {
                                    return $query->where('id', 'like', '%' . $search . '%')
                                                ->orWhere('pengirim', 'like', '%' . $search . '%')
                                                ->orWhere('nomor_surat', 'like', '%' . $search . '%')
                                                ->orWhere('tanggal_surat', 'like', '%' . $search . '%');
                                })
                                ->orderByRaw("FIELD(status, 'menunggu') DESC")
                                ->orderBy('tanggal_surat', 'desc')
                                ->paginate(10);

        return view('user.transaksiSM', compact('suratMasuks'));
    }

    public function userbukuSM(Request $request)
    {
        $dariTanggal = $request->query('dari_tanggal');
        $sampaiTanggal = $request->query('sampai_tanggal');

        $suratMasuks = SuratMasuk::when($dariTanggal && $sampaiTanggal, function ($query) use ($dariTanggal, $sampaiTanggal) {
                return $query->whereBetween('tanggal_surat', [$dariTanggal, $sampaiTanggal]);
            })
            ->paginate(10);

        return view('user.bukuSM', compact('suratMasuks'));
    }
    public function userdetailSM($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return view('user.detailSM', compact('suratMasuk'));
    }
    public function usertambahSM()
    {
        return view('user.tambahSM');
    }

    public function userStore(Request $request)
    {
        // Validate the request
        $request->validate([
            'pengirim' => 'required|string|max:255',
            'noSurat' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'tanggalSurat' => 'required|date',
            'tanggalDiterima' => 'required|date',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('surat_masuks', 'public');
        }

        // Create the SuratMasuk record
        SuratMasuk::create([
            'nomor_surat' => $request->noSurat,
            'tanggal_surat' => $request->tanggalSurat,
            'tanggal_diterima' => $request->tanggalDiterima,
            'pengirim' => $request->pengirim,
            'perihal' => $request->perihal,
            'keterangan' => $request->keterangan,
            'status' => 'Menunggu',
            'user_id' => Auth::id(),
            'file' => $filePath,
        ]);

        // Redirect with success message
        return redirect()->route('user.transaksiSM')->with('success', 'Surat Masuk berhasil ditambahkan');
    }

    public function userDisposisi($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        $disposisi = Disposisi::where('surat_masuk_id', $id)
                    ->orderBy('created_at', 'desc') // Ubah menjadi 'updated_at' jika diperlukan
                    ->get();

        return view('user.disposisi', compact('suratMasuk', 'disposisi'));
    }

    public function userEdit($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return view('user.editSM', compact('suratMasuk'));
    }
    public function userUpdate(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'pengirim' => 'required|string|max:255',
            'nomor_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'tanggal_diterima' => 'required|date',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048'
        ]);
    
        $suratMasuk = SuratMasuk::findOrFail($id);
        $suratMasuk->pengirim = $validatedData['pengirim'];
        $suratMasuk->nomor_surat = $validatedData['nomor_surat'];
        $suratMasuk->tanggal_surat = $validatedData['tanggal_surat'];
        $suratMasuk->tanggal_diterima = $validatedData['tanggal_diterima'];
        $suratMasuk->perihal = $validatedData['perihal'];
        $suratMasuk->keterangan = $validatedData['keterangan'];
    
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($suratMasuk->file) {
                Storage::delete('public/' . $suratMasuk->file);
            }
            // Store new file
            $filePath = $request->file('file')->store('suratMasuk', 'public');
            $suratMasuk->file = $filePath;
        }
    
        $suratMasuk->save();
    
        return redirect()->route('user.transaksiSM')->with('success', 'Surat Masuk berhasil diupdate');
    }
    public function userDelete($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        
        // Delete the file if it exists
        if ($suratMasuk->file) {
            Storage::delete('public/' . $suratMasuk->file);
        }
        
        $suratMasuk->delete();

        return redirect()->route('user.transaksiSM')->with('success', 'Surat Masuk berhasil dihapus');
    }

    public function kepalatransaksiSM(Request $request)
    {
        $search = $request->query('search');

        $suratMasuks = SuratMasuk::when($search, function ($query, $search) {
                                    return $query->where('id', 'like', '%' . $search . '%')
                                                ->orWhere('pengirim', 'like', '%' . $search . '%')
                                                ->orWhere('nomor_surat', 'like', '%' . $search . '%')
                                                ->orWhere('tanggal_surat', 'like', '%' . $search . '%');
                                })
                                ->orderByRaw("FIELD(status, 'menunggu') DESC")
                                ->orderBy('tanggal_surat', 'desc')
                                ->paginate(10);

        return view('kepala.transaksiSM', compact('suratMasuks'));
    }
    public function kepaladetailSM($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return view('kepala.detailSM', compact('suratMasuk'));
    }
    public function kepalabukuSM(Request $request)
    {
        $dariTanggal = $request->query('dari_tanggal');
        $sampaiTanggal = $request->query('sampai_tanggal');

        $suratMasuks = SuratMasuk::when($dariTanggal && $sampaiTanggal, function ($query) use ($dariTanggal, $sampaiTanggal) {
                return $query->whereBetween('tanggal_surat', [$dariTanggal, $sampaiTanggal]);
            })
            ->paginate(10);

        return view('kepala.bukuSM', compact('suratMasuks'));
    }

    public function kepala_disposisi($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        $disposisi = Disposisi::where('surat_masuk_id', $id)
                    ->orderBy('created_at', 'desc') // Ubah menjadi 'updated_at' jika diperlukan
                    ->get();

        return view('kepala.disposisi', compact('suratMasuk', 'disposisi'));
    }
    public function kepala_createDisposisi($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);

        return view('kepala.disposisi.create', compact('suratMasuk'));
    }

    public function kepala_storeDisposisi(Request $request, $id)
    {
        $request->validate([
            'tujuan' => 'required|string|max:255',
            'isi' => 'required|string',
            'batas_waktu' => 'required|date',
            'sifat' => 'required|string|max:255'
        ]);
    
        $disposisi = new Disposisi();
        $disposisi->surat_masuk_id = $id;
        $disposisi->tujuan = $request->tujuan;
        $disposisi->isi = $request->isi;
        $disposisi->batas_waktu = $request->batas_waktu;
        $disposisi->sifat = $request->sifat;
        $disposisi->save();
    
        // Update status surat menjadi "terdisposisi"
        $suratMasuk = SuratMasuk::findOrFail($id);
        $suratMasuk->status = 'terdisposisi';
        $suratMasuk->save();
    
        return redirect()->route('kepala.disposisi', ['id' => $id])->with('success', 'Disposisi berhasil ditambahkan');
    }

    public function destroyDisposisi($id)
    {
        $disposisi = Disposisi::findOrFail($id);
        $suratMasukId = $disposisi->surat_masuk_id; // Simpan id surat masuk sebelum dihapus
        $disposisi->delete();

        return redirect()->route('kepala.disposisi', ['id' => $suratMasukId])
            ->with('success', 'Disposisi berhasil dihapus');
    }

    public function editDisposisi($id)
    {
        $disposisi = Disposisi::findOrFail($id);
        return view('kepala.editDisposisi', compact('disposisi'));
    }

    public function updateDisposisi(Request $request, $id)
    {
        $request->validate([
            'tujuan' => 'required|string|max:255',
            'isi' => 'required|string',
            'batas_waktu' => 'required|date',
            'sifat' => 'required|string|max:255'
        ]);

        $disposisi = Disposisi::findOrFail($id);
        $disposisi->tujuan = $request->tujuan;
        $disposisi->isi = $request->isi;
        $disposisi->batas_waktu = $request->batas_waktu;
        $disposisi->sifat = $request->sifat;
        $disposisi->save();

        return redirect()->route('kepala.disposisi', ['id' => $disposisi->surat_masuk_id])
            ->with('success', 'Disposisi berhasil diperbarui');
    }
    
    public function export(Request $request)
    {
        $dariTanggal = $request->query('dari_tanggal');
        $sampaiTanggal = $request->query('sampai_tanggal');

        return Excel::download(new SuratMasukExport($dariTanggal, $sampaiTanggal), 'surat_masuk.xlsx');
    }


}
