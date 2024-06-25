<?php

namespace App\Exports;

use App\Models\SuratKeluar;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SuratKeluarExport implements FromQuery, WithHeadings
{
    use Exportable;
    protected $dariTanggal;
    protected $sampaiTanggal;

    public function __construct($dariTanggal, $sampaiTanggal)
    {
        $this->dariTanggal = $dariTanggal;
        $this->sampaiTanggal = $sampaiTanggal;
    }

    public function query()
    {
        return SuratKeluar::query()
            ->when($this->dariTanggal && $this->sampaiTanggal, function ($query) {
                return $query->whereBetween('tanggal_surat', [$this->dariTanggal, $this->sampaiTanggal]);
            });
    }

    public function headings(): array
    {
        return [
            'no',
            'nomor_surat',
            'tanggal_surat',
            'pengirim',
            'tujuan',
            'perihal',
            'keterangan',
            'file',
            'user_id',
            
        ];
    }
}
