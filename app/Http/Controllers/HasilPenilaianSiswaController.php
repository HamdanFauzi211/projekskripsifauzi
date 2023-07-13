<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\JadwalPenilaian;
use App\Models\NilaiInterpretasiAkhir;

class HasilPenilaianSiswaController extends Controller
{
    function show() {
        $data=NilaiInterpretasiAkhir::with('interpretasiakhir')->get();
        return view('guru.hasilpenilaiansiswa',['nilaiinterpretasiakhir'=>$data]);
    }
}
