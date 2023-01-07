<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Murid;
use App\Models\Kategori;
use App\Models\Semester;
use App\Models\Pelajaran;


class Raport extends Model
{
    use HasFactory;

    // Menentukan field yang bisa diisi
    protected $fillable = [
        'idmurid', 'idkategorinilai', 'idsemester', 'idpelajaran', 'nilai', 'deskripsi'
    ];


    protected $table = 'raport';

    public function murid()
    {
        return $this->belongsTo(Murid::class, 'idmurid');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'idkategorinilai');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'idsemester');
    }

    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class, 'idpelajaran');
    }
}
