<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Siswa;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'umur'
    ];

    protected $table = 'siswas';

    public function nilaiinterpretasihasil()
    {
        return $this->hasMany(NilaiInterpretasiHasil::class, 'siswa_id', 'id');

    }

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

// >-- Menampilkan Hari Bulan Tahun --<
    
public function hitungUmur()
{
    $tanggal_lahir = new \DateTime($this->tanggal_lahir);
    $sekarang = new \DateTime();
    $umur = $tanggal_lahir->diff($sekarang);

    $tahun = $umur->y;
    $bulan = $umur->m;
    $hari = $umur->d;

    $umurFormatted = '';
    if ($tahun > 0) {
        $umurFormatted .= $tahun . ' tahun, ';
    }
    if ($bulan > 0) {
        $umurFormatted .= $bulan . ' bulan, ';
    }
    if ($hari > 0) {
        $umurFormatted .= $hari . ' hari';
    }

    return $umurFormatted;
 }


// >-- Menampilkan Tahun Bulan --<


// public function hitungUmur()
// {
//     $tanggal_lahir = new \DateTime($this->tanggal_lahir);
//     $sekarang = new \DateTime();
//     $umur = $tanggal_lahir->diff($sekarang);

//     $totalBulan = ($umur->y * 12) + $umur->m;
//     $tahun = floor($totalBulan / 12);
//     $bulan = $totalBulan % 12;

//     $umurFormatted = '';
//     if ($tahun > 0) {
//         $umurFormatted .= $tahun . ' tahun, ';
//     }
//     if ($bulan > 0) {
//         $umurFormatted .= $bulan . ' bulan';
//     }

//     return $umurFormatted;
// }

// Kode menampilkan hari bulan
// public function hitungUmur()
//     {
//         $tanggalLahir = new \DateTime($this->tanggal_lahir);
//         $sekarang = new \DateTime();
//         $umur = $tanggalLahir->diff($sekarang);

//         $bulan = $umur->m;
//         $hari = $umur->d;

//         return $bulan . ' bulan, ' . $hari . ' hari';
//     }
}
