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
        
    Siswa::create([
        'id' => $request->id,
        'nis' => $request->nis,
        'nama' => $request->nama,
        'umur' => $request->umur,
        'jenis_kelamin' => $request->jenis_kelamin
    ]);

    return redirect()->route('siswa.index');
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
        $siswa = Siswa::findOrFail($siswa->id);

        $siswa->update([
            'id' => $request->id,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);

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
}
