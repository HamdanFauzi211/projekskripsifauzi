<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class JadwalPenilaian extends Model
{
    use HasFactory;

    public function kategoriumur()
    {
        return $this->belongsTo(KategoriUmur::class, 'kategori_umur_id', 'id');
    }
}


