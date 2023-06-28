<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Latihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'pertanyaan',
        'jawaban',
    ];

    public function hasil()
    {
       return $this->hasMany(Hasil::class);
    }

    public static function index()
    {
        return Latihan::all();
    }
}
