<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

     // Menentukan field yang bisa diisi
     protected $fillable = [
        'semester',
        'tahun',
    ];

    // Menentukan nama table yang digunakan
    protected $table = 'semester';

    // Menentukan relasi one-to-many dengan model Absen
    public function absen()
    {
        return $this->hasMany('App\Absen');
    }

    // Menentukan relasi one-to-many dengan model Raport
    public function raport()
    {
        return $this->hasMany('App\Raport');
    }
}
