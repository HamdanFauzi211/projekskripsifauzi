<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiInterpretasiAkhir extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'interpretasi_akhir_id',
        'jadwal_penilaian_id'
    ];

    public function interpretasiakhir(){
        return $this->belongsTo(InterpretasiAkhir::class, 'interpretasi_akhir_id', 'id');
    }

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }
}
