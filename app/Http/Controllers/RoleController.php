<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Umur;
use App\Models\Role;

class RoleController extends Controller
{
    function show() {
        $data=Role::all();
        return view('role',['role'=>$data]);
    }
}
