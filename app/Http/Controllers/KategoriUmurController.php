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

    function showadminkategoriumur() {
        $data=KategoriUmur::all();
        return view('admin.kategoriumur',['kategoriumur'=>$data]);
    }

    function showadminaspekperkembangan() {
        $data=AspekPerkembangan::all();
        return view('admin.aspekperkembangan',['aspekperkembangan'=>$data]);
    }

    function showadminitemperintah() {
        $data=ItemPerintah::all();
        return view('admin.itemperintah',['itemperintah'=>$data]);
    }

}
