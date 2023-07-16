<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiInterpretasiHasil extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'interpretasi_hasil_id',
        'siswa_id',
        'jadwal_penilaian_id',
        'aspek_perkembangan_id',
    ];

    public function interpretasihasil(){
        return $this->belongsTo(InterpretasiHasil::class, 'interpretasi_hasil_id', 'id');
    }

    public function jadwalpenilaian(){
        return $this->belongsTo(JadwalPenilaian::class, 'jadwal_penilaian_id', 'id');
    }
}
