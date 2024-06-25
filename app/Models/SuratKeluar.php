<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';
    protected $fillable = [
        'nomor_surat', 
        'tanggal_surat',  
        'pengirim', 
        'tujuan', 
        'perihal', 
        'keterangan',  
        'user_id', 
        'file',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('nomor_surat', 'like', '%' . $search . '%')
                  ->orWhere('tujuan', 'like', '%' . $search . '%')
                  ->orWhere('tanggal_surat', 'like', '%' . $search . '%');
        });
    }
}
