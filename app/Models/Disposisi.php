<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;

    protected $table = 'disposisi';
    protected $fillable = [
        'id_surat',
        'tujuan',
        'batas_waktu',
        'sifat',
        'isi',
    ];

    public function suratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class);
    }
}
