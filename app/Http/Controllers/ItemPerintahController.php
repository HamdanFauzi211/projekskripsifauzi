<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AspekPerkembangan;
use App\Models\ItemPerintah;
use App\Models\KategoriUmur;



class ItemPerintahController extends Controller
{
    function show() {
        $data=ItemPerintah::with('kategoriumur')->get();
        return view('itemperintah',['itemperintah'=>$data]);
    }
}
