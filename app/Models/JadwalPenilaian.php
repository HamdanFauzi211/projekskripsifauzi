<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class JadwalPenilaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_jadwal',
        'tanggal'
    ];

    protected $table = 'jadwal_penilaians';

    public static function index()
    {
        return JadwalPenilaian::all();
    }

    public static function store(Request $request)
    {
        JadwalPenilaian::create($request->all());
    }

    public static function edit(Request $request, JadwalPenilaian $jadwalpenilaian)
    {
        $jadwalpenilaian->update($request->all());
    }
}


