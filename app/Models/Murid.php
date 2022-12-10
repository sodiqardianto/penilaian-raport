<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;

    // Menentukan field yang bisa diisi
    protected $fillable = [
        'namamurid',
        'notelp',
        'jeniskelamin',
    ];

    // Menentukan nama table yang digunakan
    protected $table = 'murid';

    // Menentukan relasi one-to-many dengan model Absen
    public function absen()
    {
        return $this->hasMany('App\Absen');
    }

    // Menentukan relasi one-to-many dengan model KelasMurid
    public function kelasmurid()
    {
        return $this->hasMany('App\KelasMurid');
    }

    // Menentukan relasi one-to-many dengan model Raport
    public function raport()
    {
        return $this->hasMany('App\Raport');
    }

}
