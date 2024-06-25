<?php

namespace App\Exports;

use App\Models\SuratMasuk;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SuratMasukExport implements FromQuery, WithHeadings
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
        return SuratMasuk::query()
            ->when($this->dariTanggal && $this->sampaiTanggal, function ($query) {
                return $query->whereBetween('tanggal_surat', [$this->dariTanggal, $this->sampaiTanggal]);
            });
    }

    public function headings(): array
    {
        return [
            'No.Agenda',
            'Pengirim',
            'No.Surat',
            'Tanggal Surat',
            'Tanggal Diterima',
            'Perihal',
            'Keterangan',
            'Status',
            'User ID',
            'File'
        ];
    }
}
