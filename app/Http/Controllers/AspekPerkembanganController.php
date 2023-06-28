<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AspekPerkembangan;
use App\Models\ItemPerintah;
use App\Models\KategoriUmur;

class AspekPerkembanganController extends Controller
{
    function show() {
        $data=AspekPerkembangan::all();
        return view('aspekperkembangan',['aspekperkembangan'=>$data]);
    }
}
