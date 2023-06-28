<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Role extends Model
{
    use HasFactory;

    protected $filable = [
        'id',
        'nama_role',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public static function index()
    {
        return Role::all();
    }
}
