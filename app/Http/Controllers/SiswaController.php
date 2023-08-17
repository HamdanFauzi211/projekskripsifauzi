<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.siswa.index', ['siswa' => Siswa::index()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
        ]);
    
        $siswa = new Siswa();
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->umur = $siswa->hitungUmur();
        $siswa->save();
    return redirect()->route('siswa.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show() {
    {
            $data=Siswa::all();
            return view('guru.siswa',['siswa'=>$data]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('admin.siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
{
    $request->validate([
        'nis' => 'required',
        'nama' => 'required',
        'jenis_kelamin' => 'required',
    ]);

    $siswa->nis = $request->nis;
    $siswa->nama = $request->nama;
    $siswa->jenis_kelamin = $request->jenis_kelamin;

    // Jika tanggal_lahir tersedia dalam request, simpan nilainya
    if ($request->has('tanggal_lahir')) {
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->umur = $siswa->hitungUmur();
    }

    $siswa->save();

    return redirect()->route('siswa.index');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->back();
    }

    public function showgrafikadmin() {
        {
                $data=Siswa::all();
                return view('admin.grafik',['siswa'=>$data]);
            }
        }
}