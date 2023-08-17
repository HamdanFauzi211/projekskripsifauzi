<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriUmur;
use App\Models\ItemPerintah;
use App\Models\AspekPerkembangan;
use App\Models\Siswa;
use App\Models\Penilaian;
use App\Models\NilaiInterpretasiHasil;
use App\Models\NilaiInterpretasiAkhir;
use DB;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexLangkah1($jadwal_penilaian_id)
    {
        $siswa = Siswa::with(['nilaiinterpretasihasil' => function($query) use($jadwal_penilaian_id) {
            $query->whereNot('jadwal_penilaian_id', $jadwal_penilaian_id);
        }])
        ->get();
        
        $data = KategoriUmur::all();

        return view('guru.penilaian.screaningtest.langkah1', compact('siswa','data', 'jadwal_penilaian_id'));
    }

    public function storeLangkah1(Request $request)
    {
        $siswa_id = $request->get('siswa_id');
        $kategori_umur_id = $request->get('kategoriumur_id');
        $jadwal_penilaian_id = $request->get('jadwal_penilaian_id');

        return redirect()->route('penilaian.screening.langkah2.index', ['siswa_id' => $siswa_id, 'kategori_umur_id' => $kategori_umur_id , 'jadwal_penilaian_id' => $jadwal_penilaian_id]);
    }

    
    public function indexLangkah2($jadwal_penilaian_id, $siswa_id, $kategori_umur_id)
    {
        $dinilai = Penilaian::where('siswa_id', $siswa_id)
            ->where('jadwal_penilaian_id', $jadwal_penilaian_id)
            ->exists();

        if($dinilai){
            return view('guru.penilaian.screaningtest.langkah2')->with('alert', 'Penilaian telah dilakukan');
        }else{
            $data = AspekPerkembangan::with(['itemperintah' => function ($query) use ($kategori_umur_id) {
                $query->where('kategori_umur_id', $kategori_umur_id);
            }])
            ->get(); 
            
            return view('guru.penilaian.screaningtest.langkah2', compact('data', 'siswa_id', 'kategori_umur_id', 'jadwal_penilaian_id'));
        }    
    }

    public function storeLangkah2(Request $request)
    {
        $kategori_umur_id = $request->get('kategori_umur_id');
        $siswa_id = $request->get('siswa_id');
        $jadwal_penilaian_id = $request->get('jadwal_penilaian_id');

        $data = AspekPerkembangan::with(['itemperintah' => function ($query) use ($kategori_umur_id) {
            $query->where('kategori_umur_id', $kategori_umur_id);
        }])
        ->get();

        $motorik_kasar = $request->get('motorik_kasar');
        $motorik_halus = $request->get('motorik_halus');
        $bicara_dan_bahasa = $request->get('bicara_dan_bahasa');
        $sosial_dan_kemandirian = $request->get('sosial_dan_kemandirian');
        
        foreach($data as $i => $aspek_perkembangan){

            $total = 100;
            $jumlahItemPerintah = count($aspek_perkembangan->itemperintah);
            $skor = $jumlahItemPerintah > 0 ? $total / $jumlahItemPerintah : 100;

            $aspekPerkembangan = [];
            switch ($i) {
                case 0:
                    $aspekPerkembangan = $motorik_kasar;
                    break;
                case 1:
                    $aspekPerkembangan = $motorik_halus;
                    break;
                case 2:
                    $aspekPerkembangan = $bicara_dan_bahasa;
                    break;
                case 3:
                    $aspekPerkembangan = $sosial_dan_kemandirian;
                    break;
                default:
                    break;
            }

            foreach($aspek_perkembangan->itemperintah as $j => $item_perintah){ 
                $nilai_akhir = "";
                $skor_akhir = 0;

                if($aspekPerkembangan[$j] == "lulus"){
                    $nilai_akhir = "Lulus";
                    $skor_akhir = $skor;
                }else{
                    if($aspekPerkembangan[$j] == "tidak_lulus"){
                        $nilai_akhir = "Tidak Lulus";
                    }else{
                        $nilai_akhir = "Menolak";
                    }

                    $skor_akhir = 0;
                }

                Penilaian::create([
                    'nilai' => $nilai_akhir,
                    'skor' => $skor_akhir,
                    'item_perintah_id' => $item_perintah->id,
                    'siswa_id' => $siswa_id,
                    'jadwal_penilaian_id' => $jadwal_penilaian_id
                ]);
            }
        }

        return redirect()->route('penilaian.screening.hasil.index', ['jadwal_penilaian_id' => $jadwal_penilaian_id, 'siswa_id' => $siswa_id]);
    }

    public function storeHasilPenilaian($jadwal_penilaian_id, $siswa_id, $data){
        $total_motorik_kasar = $data->where('aspek_perkembangan_id', 1)->pluck('penilaian.0.skor')->sum();
        $total_motorik_halus = $data->where('aspek_perkembangan_id', 2)->pluck('penilaian.0.skor')->sum();
        $total_bicara_dan_bahasa = $data->where('aspek_perkembangan_id', 3)->pluck('penilaian.0.skor')->sum();
        $total_sosial_dan_kemandirian = $data->where('aspek_perkembangan_id', 4)->pluck('penilaian.0.skor')->sum();

        $store_data = [
            [
                'interpretasi_hasil_id' => $total_motorik_kasar >= 50 ? 1 : 2,
                'siswa_id' => $siswa_id,
                'jadwal_penilaian_id' => $jadwal_penilaian_id,
                'aspek_perkembangan_id' => 1
            ],
            [
                'interpretasi_hasil_id' => $total_motorik_halus >= 50 ? 1 : 2,
                'siswa_id' => $siswa_id,
                'jadwal_penilaian_id' => $jadwal_penilaian_id,
                'aspek_perkembangan_id' => 2
            ],
            [
                'interpretasi_hasil_id' => $total_bicara_dan_bahasa >= 50 ? 1 : 2,
                'siswa_id' => $siswa_id,
                'jadwal_penilaian_id' => $jadwal_penilaian_id,
                'aspek_perkembangan_id' => 3
            ],
            [
                'interpretasi_hasil_id' => $total_sosial_dan_kemandirian >= 50 ? 1 : 2,
                'siswa_id' => $siswa_id,
                'jadwal_penilaian_id' => $jadwal_penilaian_id,
                'aspek_perkembangan_id' => 4
            ]
        ];

        foreach ($store_data as $record) {
            NilaiInterpretasiHasil::create($record);
        }
        
    }

    public function hasilpenilaian($jadwal_penilaian_id, $siswa_id)
    {
        $data = ItemPerintah::withWhereHas('penilaian', function ($query) use ($jadwal_penilaian_id, $siswa_id) {
            $query->where('jadwal_penilaian_id', $jadwal_penilaian_id)
                  ->where('siswa_id', $siswa_id);
        })
        ->get();

        $this->storeHasilPenilaian($jadwal_penilaian_id, $siswa_id, $data);
            
        return view('guru.penilaian.screaningtest.hasil', compact('data', 'jadwal_penilaian_id', 'siswa_id'));
    }

    public function storeHasilPenilaianAkhir($siswa_id, $jadwal_penilaian_id){
        $data = NilaiInterpretasiHasil::where('siswa_id', $siswa_id)
            ->where('jadwal_penilaian_id', $jadwal_penilaian_id)
            ->get()
            ->pluck('interpretasi_hasil_id')
            ->toArray();
        
        $jumlah_hasil = array_count_values($data);

        $insert_data = [];

        if ((isset($jumlah_hasil[1]) && $jumlah_hasil[1] >= 3) || (isset($jumlah_hasil[2]) && $jumlah_hasil[2] <= 1)) {
            $insert_data = [
                'siswa_id' => $siswa_id,
                'interpretasi_akhir_id' => 1,
                'jadwal_penilaian_id' => $jadwal_penilaian_id
            ];

        } else if ( (isset($jumlah_hasil[1]) && $jumlah_hasil[1] == 2) || (isset($jumlah_hasil[2]) && $jumlah_hasil[2] == 2)) {
            $insert_data = [
                'siswa_id' => $siswa_id,
                'interpretasi_akhir_id' => 2,
                'jadwal_penilaian_id' => $jadwal_penilaian_id
            ];
        }else{
            $insert_data = [
                'siswa_id' => $siswa_id,
                'interpretasi_akhir_id' => 3,
                'jadwal_penilaian_id' => $jadwal_penilaian_id
            ];
        }

        NilaiInterpretasiAkhir::create($insert_data);
    }

    public function hasilPenilaianAkhir($jadwal_penilaian_id, $siswa_id){
       $this->storeHasilPenilaianAkhir($siswa_id, $jadwal_penilaian_id);

       $kesimpulan = NilaiInterpretasiAkhir::with('interpretasiakhir', 'siswa')
        ->where('jadwal_penilaian_id', $jadwal_penilaian_id)
        ->where('siswa_id', $siswa_id)
        ->first();

        return view('guru.penilaian.screaningtest.kesimpulan', compact('kesimpulan'));
    }

    public function showSiswaPenilaian($siswa_id)
    {
        $penilaian = Penilaian::where('siswa_id', $siswa_id)->get();
        return view('guru.hasildetail', compact('penilaian'));
    }

    // public function showSiswaPenilaianAdmin($siswa_id)
    // {
    //     $penilaian = Penilaian::where('siswa_id', $siswa_id)->get();
    //     return view('admin.hasildetail', compact('penilaian'));
    // }

    public function showSiswaPenilaianAdmin($siswa_id, $hari_dipilih)
    {
        // Ambil data dari model Penilaian berdasarkan siswa_id dan hari_dipilih
        $penilaian = Penilaian::whereHas('jadwalpenilaian', function ($query) use ($hari_dipilih) {
            $query->where('nama_jadwal', $hari_dipilih);
        })->where('siswa_id', $siswa_id)->get();
           // Tambahkan informasi interpretasi_akhir_id
        $penilaian->load('interpretasi_akhir');

        $hari = DB::table('jadwal_penilaians')->where('id',$penilaian->first()->jadwal_penilaian_id)->first()->nama_jadwal;

        // Tampilkan halaman dengan data yang diperlukan
        return view('admin.hasildetail', compact('penilaian','hari'));
    }

    public function hasilgrafikadmin()
    {
        // Data dari database (sesuaikan dengan data aktual)
        $nilaiinterpretasiakhir = InterpretasiAkhir::with('siswa')->get();

        return view('guru.hasilgrafik', compact('nilaiinterpretasiakhir'));
    }
}
