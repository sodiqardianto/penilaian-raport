<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'kelas',
    ];

    public function walikelas()
    {
        return $this->hasMany('App\Walikelas','idkelas');
    }

    public function kelasmurid()
    {
        return $this->hasMany('App\Kelasmurid');
    }
}
