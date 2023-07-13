<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Models\Siswa;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nis',
        'nama',
        'umur',
        'jenis_kelamin'
    ];

    protected $table = 'siswas';

    public static function index()
    {
        return Siswa::all();
    }

    public static function store(Request $request)
    {
        Siswa::create($request->all());
    }

    public static function edit(Request $request, Siswa $siswa)
    {
        $siswa->update($request->all());
    }

}
