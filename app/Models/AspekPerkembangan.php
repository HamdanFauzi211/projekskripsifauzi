<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AspekPerkembangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_aspek',
    ];

    public function itemperintah()
    {
       return $this->hasMany(ItemPerintah::class);
    }

    public static function index()
    {
        return AspekPerkembangan::all();
    }
}
