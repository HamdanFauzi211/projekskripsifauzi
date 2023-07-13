<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\JadwalPenilaian;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function register()
    {
        return view('admin.registrasi');
    } 

    public function prosesRegister(Request $request)
    {

        User::create([
            'nama' => $request['nama'],
            'no_hp' => $request['no_hp'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
        ]);
        return redirect('/admin/index');
    } 

    public function user()
    {
        $user = User::all();
        return view('admin.account.user', compact('user'));
    }

    public function index()
    {
        return view('admin.jadwalpenilaian.index', ['jadwalpenilaian' => JadwalPenilaian::index()]);
    }

    public function create()
    {
        return view('admin.jadwalpenilaian.create');
    }

    public function store(Request $request)
    {
        
    JadwalPenilaian::create([
        'id' => $request->id,
        'nama_jadwal' => $request->nama_jadwal,
        'tanggal' => $request->tanggal
    ]);

    return redirect()->route('jadwalpenilaian.index');
    }

    public function edit(JadwalPenilaian $jadwalpenilaian)
    {
        return view('admin.jadwalpenilaian.edit', compact('jadwalpenilaian'));
    }

    public function update(Request $request, JadwalPenilaian $jadwalpenilaian)
    {
        $jadwalpenilaian = JadwalPenilaian::findOrFail($jadwalpenilaian->id);

        $jadwalpenilaian->update([
            'id' => $request->id,
            'nama_jadwal' => $request->nama_jadwal,
            'tanggal' => $request->tanggal
        ]);

        return redirect()->route('jadwalpenilaian.index');
    }

    public function destroy(JadwalPenilaian $jadwalpenilaian)
    {
        $jadwalpenilaian->delete();

        return redirect()->back();
    }
}
