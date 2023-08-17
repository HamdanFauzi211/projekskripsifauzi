<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\JadwalPenilaian;
use App\Models\NilaiInterpretasiAkhir;

class HasilPenilaianSiswaController extends Controller
{
    function showguru() {
        $data=NilaiInterpretasiAkhir::with('interpretasiakhir')->get();
        return view('guru.hasilpenilaiansiswa',['nilaiinterpretasiakhir'=>$data]);
    }

    // function showadmin() {
    //     $data=NilaiInterpretasiAkhir::with('interpretasiakhir')->get();
    //     return view('admin.hasilpenilaiansiswa',['nilaiinterpretasiakhir'=>$data]);
    // }

    public function showhasilkeseluruhanadmin()
    {
        // Ambil data dari model NilaiInterpretasiAkhir
        $nilaiinterpretasiakhir = NilaiInterpretasiAkhir::all();

        // Tampilkan halaman dengan data yang diperlukan
        return view('admin.hasilpenilaiansiswa', compact('nilaiinterpretasiakhir'));
    }
}
