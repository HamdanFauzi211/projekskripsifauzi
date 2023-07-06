<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriUmur;
use App\Models\ItemPerintah;
use App\Models\AspekPerkembangan;
use App\Models\Siswa;
use App\Models\Penilaian;
class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexLangkah1($jadwal_penilaian_id)
    {
        $siswa = Siswa::all();
        $data = KategoriUmur::all();

        return view('penilaian.screaningtest.langkah1', compact('siswa','data', 'jadwal_penilaian_id'));
    }

    public function storeLangkah1(Request $request)
    {
        $siswa_id = $request->get('siswa_id');
        $kategori_umur_id = $request->get('kategoriumur_id');
        $jadwal_penilaian_id = $request->get('jadwal_penilaian_id');

        return redirect()->route('penilaian.screening.langkah2.index', ['siswa_id' => $siswa_id, 'kategori_umur_id' => $kategori_umur_id , 'jadwal_penilaian_id' => $jadwal_penilaian_id]);
    }

    
    public function indexLangkah2($siswa_id, $kategori_umur_id, $jadwal_penilaian_id)
    {
        $data = AspekPerkembangan::with(['itemperintah' => function ($query) use ($kategori_umur_id) {
                $query->where('kategori_umur_id', $kategori_umur_id);
            }])
            ->get();

        return view('penilaian.screaningtest.langkah2', compact('data', 'siswa_id', 'kategori_umur_id', 'jadwal_penilaian_id'));
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
            $nilai = 100 / count($aspek_perkembangan->itemperintah);
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
                default:
                    $aspekPerkembangan = $sosial_dan_kemandirian;
                    break;
            } 

            foreach($aspek_perkembangan->itemperintah as $j => $item_perintah){               
                Penilaian::create([
                    'nilai' => $aspekPerkembangan[$j] == "true" ? "Lulus" : "Tidak Lulus",
                    'skor' => $aspekPerkembangan[$j] == "true" ? $nilai : "0",
                    'item_perintah_id' => $item_perintah->id,
                    'siswa_id' => $siswa_id,
                    'jadwal_penilaian_id' => $jadwal_penilaian_id
                ]);
            }
        }

        return redirect()->route('penilaian.screening.hasil.index', ['jadwal_penilaian_id' => $jadwal_penilaian_id]);
    }

    public function hasilpenilaian($jadwal_penilaian_id)
    {
        $data = ItemPerintah::with(['penilaian' => function ($query) use ($jadwal_penilaian_id){
            $query->where('jadwal_penilaian_id', $jadwal_penilaian_id);
        }])
            ->whereHas('penilaian')
            ->get();        
        return view('penilaian.screaningtest.hasil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
