<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AspekPerkembangan;
use App\Models\ItemPerintah;
use App\Models\KategoriUmur;

class KategoriUmurController extends Controller
{
    function show() {
        $data=KategoriUmur::all();
        return view('guru.kategoriumur',['kategoriumur'=>$data]);
    }
}
