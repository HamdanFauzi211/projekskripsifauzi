<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Hasil extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'latihan_id',
    ];

    public function latihan()
    {
        return $this->belongsTo(Latihan::class, 'latihan_id', 'id');
    }

    public static function index()
    {
        return Hasil::all();
    }
}
