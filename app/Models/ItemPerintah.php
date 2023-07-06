<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ItemPerintah extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'perintah',
        'aspek_perkembangan_id',
        'kategori_umur_id',
    ];

    public function aspekperkembangan()
    {
        return $this->belongsTo(AspekPerkembangan::class, 'aspek_perkembangan_id', 'id');
    }

    public function kategoriumur()
    {
        return $this->belongsTo(KategoriUmur::class, 'kategori_umur_id', 'id');
    }

    public function penilaian(){
        return $this->hasMany(Penilaian::class, 'item_perintah_id', 'id');
    }

    public static function index()
    {
        return ItemPerintah::all();
    }
}
