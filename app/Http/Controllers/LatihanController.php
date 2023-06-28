<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Latihan;
use App\Models\Hasil;

class LatihanController extends Controller
{
    function show() {
        $data=Latihan::all();
        return view('latihan',compact(['data']));
    }

    function proses(Request $request) {
        
        // ambil data latihan berdasarkan id dicentang
        $latihan = Latihan::whereIn('id', $request->get('latihan_id'))
            ->get();

        //ambil id saja
        $ids = $latihan->pluck('id');

        // masukin id satu per satu
        foreach($ids as $id){
            Hasil::insert([
                'latihan_id' => $id
            ]);
        }

        
        $hasil = Hasil::with('latihan')
            ->whereIn('latihan_id', $ids)
            ->get();
            
        return view('hasil', compact(['hasil']));
    }

    function result() {
        //
    }
}
