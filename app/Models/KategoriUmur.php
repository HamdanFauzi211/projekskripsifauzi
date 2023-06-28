<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class KategoriUmur extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_umur',
    ];

    public function itemperintah()
    {
       return $this->hasMany(ItemPerintah::class);
    }

    public static function index()
    {
        return KategoriUmur::all();
    }
}
