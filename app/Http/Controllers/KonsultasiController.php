<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function index()
    {
        $konsultasis = Konsultasi::all();

        return view('orangtua.konsultasi.index', compact('konsultasis'));
    }

    public function create()
    {
        return view('orangtua.konsultasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pesan' => 'required',
            'tanggal' => 'required|date',
            'role' => 'required',
        ]);

        Konsultasi::create($request->all());

        return redirect()->route('konsultasi.index')->with('success', 'Konsultasi berhasil ditambahkan.');
    }

    public function edit(Konsultasi $konsultasi)
    {
        return view('orangtua.konsultasi.edit', compact('konsultasi'));
    }

    public function update(Request $request, Konsultasi $konsultasi)
    {
        $request->validate([
            'pesan' => 'required',
            'hasil' => 'required',
            'tanggal' => 'required|date',
            'role' => 'required',
        ]);

        $konsultasi->update($request->all());

        return redirect()->route('konsultasi.index')->with('success', 'Konsultasi berhasil diperbarui.');
    }

    public function destroy(Konsultasi $konsultasi)
    {
        $konsultasi->delete();

        return redirect()->route('konsultasi.index')->with('success', 'Konsultasi berhasil dihapus.');
    }
}
