<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    use HasFactory;

    // Menentukan field yang bisa diisi
    protected $fillable = [
        'namamatapelajaran',
    ];

    // Menentukan nama table yang digunakan
    protected $table = 'pelajaran';

    // Menentukan relasi one-to-many dengan model Gurupelajaran
    public function gurupelajaran()
    {
        return $this->hasMany('App\Gurupelajaran');
    }
}
