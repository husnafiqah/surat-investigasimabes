<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuatSurat extends Model
{
    use HasFactory;
    protected $table = 'buat_surat';
    protected $fillable = [
        'nomor_surat', 
        'tanggal_surat',  
        'tujuan', 
        'perihal', 
        'isi',
          
    ];

}
