<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuks';
    protected $fillable = [
        'nomor_surat', 
        'tanggal_surat', 
        'tanggal_diterima', 
        'pengirim', 'perihal', 
        'keterangan', 
        'status', 
        'user_id', 
        'file',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function disposisi()
    {
        return $this->hasOne(Disposisi::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('nomor_surat', 'like', '%' . $search . '%')
                  ->orWhere('pengirim', 'like', '%' . $search . '%')
                  ->orWhere('tanggal_surat', 'like', '%' . $search . '%')
                  ->orWhere('status', 'like', '%' . $search . '%'); 
        });
    }
}
