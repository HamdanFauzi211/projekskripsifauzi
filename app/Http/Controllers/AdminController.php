<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\JadwalPenilaian;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use App\Models\Chart;
use App\Models\NilaiInterpretasiAkhir;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function register()
    {
        $siswas = Siswa::all();
        return view('admin.registrasi', compact('siswas'));
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
        // 'id' => $request->id,
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
            // 'id' => $request->id,
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

    // public function showadminhasilgrafik($siswa_id)
    // {
    //     // Lakukan query untuk mendapatkan data interpretasi akhir sesuai siswa_id
    //     $dataInterpretasiAkhir = NilaiInterpretasiAkhir::where('siswa_id', $siswa_id)->get();

    //     // Kirim data interpretasi akhir ke halaman grafik anak
    //     return view('admin.hasilgrafik', ['dataInterpretasiAkhir' => $dataInterpretasiAkhir]);
    // }

    public function showadminhasilgrafik($siswa_id)
    {
    
            $InterpretasiAkhir = DB::table('nilai_interpretasi_akhirs')
                ->join('interpretasi_akhirs', 'nilai_interpretasi_akhirs.interpretasi_akhir_id', '=', 'interpretasi_akhirs.id')
                ->join('siswas', 'nilai_interpretasi_akhirs.siswa_id', '=', 'siswas.id')
                ->select('nilai_interpretasi_akhirs.interpretasi_akhir_id', DB::raw('count(*) as total'))
                ->groupBy('nilai_interpretasi_akhirs.interpretasi_akhir_id')
                ->pluck('total')
                ->all();
    
            $InterpretasiAkhirColours = [];
            
            for ($i = 0; $i < count($InterpretasiAkhir); $i++) {
                $r = $randomNumber = floor(rand(0, 254));
                $g = $randomNumber = floor(rand(0, 254));
                $b = $randomNumber = floor(rand(0, 254));
                $InterpretasiAkhirColours[] = "rgb(".$r.",".$g.",".$b.")";
            }
    
            // Membuat Data Chart untuk Damage
            $InterpretasiAkhirChart = new Chart;
            $InterpretasiAkhirChart->labels = array_keys($InterpretasiAkhir);
            $InterpretasiAkhirChart->dataset = array_values($InterpretasiAkhir);
            $InterpretasiAkhirChart->colours = $InterpretasiAkhirColours;
            $InterpretasiAkhirChart->title = "Total Statistik Interpretasi";
    
            $getAllChart = [
                'InterpretasiAkhirChart' => $InterpretasiAkhirChart, 
            ];
    
            return view('admin.hasilgrafik', compact(
                'getAllChart'
            ));
        }
        
        public function grafikTotal()
    {
    
            $InterpretasiAkhir = DB::table('nilai_interpretasi_akhirs')
                ->join('interpretasi_akhirs', 'nilai_interpretasi_akhirs.interpretasi_akhir_id', '=', 'interpretasi_akhirs.id')
                ->join('siswas', 'nilai_interpretasi_akhirs.siswa_id', '=', 'siswas.id')
                ->select('nilai_interpretasi_akhirs.interpretasi_akhir_id', DB::raw('count(*) as total'))
                ->groupBy('nilai_interpretasi_akhirs.interpretasi_akhir_id')
                ->pluck('total')
                ->all();
    
            $InterpretasiAkhirColours = [];
            
            for ($i = 0; $i < count($InterpretasiAkhir); $i++) {
                $r = $randomNumber = floor(rand(0, 254));
                $g = $randomNumber = floor(rand(0, 254));
                $b = $randomNumber = floor(rand(0, 254));
                $InterpretasiAkhirColours[] = "rgb(".$r.",".$g.",".$b.")";
            }
    
            // Membuat Data Chart untuk Damage
            $InterpretasiAkhirChart = new Chart;
            $InterpretasiAkhirChart->labels = array_keys($InterpretasiAkhir);
            $InterpretasiAkhirChart->dataset = array_values($InterpretasiAkhir);
            $InterpretasiAkhirChart->colours = $InterpretasiAkhirColours;
            $InterpretasiAkhirChart->title = "Total Statistik Interpretasi";
    
            $getAllChart = [
                'InterpretasiAkhirChart' => $InterpretasiAkhirChart, 
            ];
    
            return view('admin.grafiktotal', compact(
                'getAllChart'
            ));
        }

        public function grafik_anak(){
            $data = DB::table('nilai_interpretasi_akhirs as a')
                    ->select('a.*', 'b.nama', 'c.kesimpulan', 'd.nama_jadwal', 'd.tanggal as tanggal_jadwal')
                    ->leftJoin('siswas as b', 'a.siswa_id', '=', 'b.id')
                    ->leftJoin('interpretasi_akhirs as c', 'a.interpretasi_akhir_id', '=', 'c.id')
                    ->leftJoin('jadwal_penilaians as d', 'a.jadwal_penilaian_id', '=', 'd.id')
                    ->get();
            echo json_encode($data);
        }

        public function contohchartline()
    {
        // Data dummy untuk contoh grafik garis
        $data = [
            [
                'label' => 'Data 1',
                'data' => [10, 15, 20, 12, 8, 18],
            ],
            [
                'label' => 'Data 2',
                'data' => [5, 12, 8, 10, 15, 9],
            ],
        ];

        return view('admin.contohchartline')->with('data', $data);
    }
}
