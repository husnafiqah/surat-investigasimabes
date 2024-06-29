<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\BuatSurat;

class BuatSuratController extends BaseController
{

    public function adminBuatsurat()
    {
        return view('admin.buatsurat');
    }
    public function adminStore(Request $request)
    {
        // Validate the request
        $request->validate([
            'tujuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'tanggalSurat' => 'required|date',
            'isi' => 'required|string',
            'nomor_surat'=> 'required|string',
        ]);

        // Get the current year and month in Roman numeral
        $currentYear = date('Y');
        $currentMonth = date('n'); // 'n' provides the month number without leading zeros
        $romanMonths = [1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'];
        $romanMonth = $romanMonths[$currentMonth];

        
        $formattedSequenceNumber = str_pad($request->nomor_surat, 3, '0', STR_PAD_LEFT); // Pad sequence number to 3 digits

        // Define the constant parts of the nomor_surat
        $jenisSuratCode = '01'; // Kode nomor surat keluar for jenis surat KERJASAMA
        $namaProfilLembaga = 'IM'; // Profil lembaga

        // Construct the nomor_surat
        $nomorSurat = sprintf('%s.%s/%s/%s/%s', $jenisSuratCode, $formattedSequenceNumber, $namaProfilLembaga, $romanMonth, $currentYear);

        // Create BuatSurat record
        $buatsurat = BuatSurat::create([
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => $request->tanggalSurat,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'isi' => $request->isi,
        ]);

    // Redirect to a route that generates and downloads the document
    return redirect()->route('generate', $buatsurat->id);
}


    public function generateDocument($id)
    {
        // Retrieve the generated document data from the database
        $buatsurat = BuatSurat::findOrFail($id);

        // Generate PDF based on data
        $pdf = PDF::loadView('pdf.suratya', compact('buatsurat'));

        // Download the PDF
        return $pdf->stream('Surat_' . $buatsurat->nomor_surat . '.pdf');
    }

    public function userBuatsurat()
    {
        return view('user.buatsurat');
    }

    public function userStore(Request $request)
    {
            // Validate the request
            $request->validate([
                'tujuan' => 'required|string|max:255',
                'perihal' => 'required|string|max:255',
                'tanggalSurat' => 'required|date',
                'isi' => 'required|string',
                'nomor_surat'=> 'required|string',
            ]);

            // Get the current year and month in Roman numeral
            $currentYear = date('Y');
            $currentMonth = date('n'); // 'n' provides the month number without leading zeros
            $romanMonths = [1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'];
            $romanMonth = $romanMonths[$currentMonth];

            
            $formattedSequenceNumber = str_pad($request->nomor_surat, 3, '0', STR_PAD_LEFT); // Pad sequence number to 3 digits

            // Define the constant parts of the nomor_surat
            $jenisSuratCode = '01'; // Kode nomor surat keluar for jenis surat KERJASAMA
            $namaProfilLembaga = 'IM'; // Profil lembaga

            // Construct the nomor_surat
            $nomorSurat = sprintf('%s.%s/%s/%s/%s', $jenisSuratCode, $formattedSequenceNumber, $namaProfilLembaga, $romanMonth, $currentYear);

            // Create BuatSurat record
            $buatsurat = BuatSurat::create([
                'nomor_surat' => $nomorSurat,
                'tanggal_surat' => $request->tanggalSurat,
                'tujuan' => $request->tujuan,
                'perihal' => $request->perihal,
                'isi' => $request->isi,
            ]);

        // Redirect to a route that generates and downloads the document
        return redirect()->route('user.generate', $buatsurat->id);
    }


    public function user_generateDocument($id)
    {
        // Retrieve the generated document data from the database
        $buatsurat = BuatSurat::findOrFail($id);

        // Generate PDF based on data
        $pdf = PDF::loadView('pdf.suratya', compact('buatsurat'));

        // Download the PDF
        return $pdf->stream('Surat_' . $buatsurat->nomor_surat . '.pdf');
    }
    

    
}
