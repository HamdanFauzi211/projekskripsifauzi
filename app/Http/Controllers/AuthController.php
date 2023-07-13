<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Providers\RouteServiceProvider;

class AuthController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->role == 'Admin') {
                return redirect()->intended('/admin/index');
            } elseif ($user->role == 'Guru') {
                return redirect()->intended('/guru/index');
            } elseif ($user->role == 'OrangTua') {
                return redirect()->intended('/orangtua/index');
            } elseif ($user->role == 'Pakar') {
                return redirect()->intended('/pakar/index');
            }
        }
        return view('auth.login');
    }   

    public function login(Request $request)
    {

        $kredensil = $request->only('username','password');

            if (Auth::attempt($kredensil)) {
                $user = Auth::user();
                if ($user->role == 'Admin') {
                    $request->session()->regenerate();
                    return redirect()->intended('/admin/index');
                } elseif ($user->role == 'Guru') {
                    $request->session()->regenerate();
                    return redirect()->intended('/guru/index');
                } elseif ($user->role == 'OrangTua') {
                    $request->session()->regenerate();
                    return redirect()->intended('/orangtua/index');
                } elseif ($user->role == 'Pakar') {
                    $request->session()->regenerate();
                    return redirect()->intended('/pakar/index');
                }
                return redirect()->session()->regenerate();
            }

        return redirect('login')
                ->withInput()
                ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }  
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }


    public function AdminIndex()
    {
       return view('admin.index');
    }

    public function GuruIndex()
     {
        return view('guru.index');
     }

     public function OrangTuaIndex()
     {
        return view('orangtua.index');
     }
     public function PakarIndex()
     {
        return view('pakar.index');
     }
}
