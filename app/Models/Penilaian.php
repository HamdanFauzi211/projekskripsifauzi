<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Penilaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'nilai',
        'skor',
        'item_perintah_id',
        'siswa_id',
        'jadwal_penilaian_id',
    ];


    public function kategoriumur()
    {
        return $this->belongsTo(KategoriUmur::class, 'kategori_umur_id', 'id');
    }

    public function itemperintah()
    {
        return $this->belongsTo(ItemPerintah::class, 'item_perintah_id', 'id');
    }
}
