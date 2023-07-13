<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class InterpretasiAkhir extends Model
{
    use HasFactory;

protected $fillable = [
    'kesimpulan',
    'keterangan',
    ];

    public function interpretasiakhir()
    {
       return $this->hasMany(NilaiInterpretasiAkhir::class);
    }

    public static function index()
    {
        return InterpretasiAkhir::all();
    }
}
