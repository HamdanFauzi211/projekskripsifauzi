<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PDF;
use App\Models\Penilaian;
use DB;
class PDFController extends Controller
{
    public function downloadPDF($siswa_id , $hari_dipilih)
    {
        $penilaian = Penilaian::whereHas('jadwalpenilaian', function ($query) use ($hari_dipilih) {
            $query->where('nama_jadwal', $hari_dipilih);
        })->where('siswa_id', $siswa_id)->get();
        
        $hari = DB::table('jadwal_penilaians')->where('id',$penilaian->first()->jadwal_penilaian_id)->first()->nama_jadwal;
        // Tambahkan informasi interpretasi_akhir_id
        $penilaian->load('interpretasi_akhir');
        // Ubah koleksi menjadi array sebelum diteruskan ke view

        $pdf = PDF::loadView('your_view_file',compact('penilaian', 'hari'));

        return $pdf->download('your_file_name.pdf');
    }
}
