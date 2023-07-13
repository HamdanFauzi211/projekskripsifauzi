<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        switch(Auth::user()->role){
            case 'Admin':
                $this->redirectTo = '/admin/index';
                return $this->redirectTo;
                break;
            case 'Guru':
                $this->redirectTo = '/guru/index';
                 return $this->redirectTo;
                break;
                case 'OrangTua':
                    $this->redirectTo = '/orangtua/index';
                     return $this->redirectTo;
                    break;
                    case 'Pakar':
                        $this->redirectTo = '/pakar/index';
                         return $this->redirectTo;
                        break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }
             // return $next($request);
        
    } 
    
    public function username()
    {
        return 'username';
    }
}
