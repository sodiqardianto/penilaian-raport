<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Gurupelajaran;


class Kelaspelajaran extends Model
{
    use HasFactory;

    protected $table = 'kelaspelajaran';

    protected $fillable = [
        'idkelas', 'idgurupelajaran',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'idkelas');
    }

    public function gurupelajaran()
    {
        return $this->belongsTo(Gurupelajaran::class,'idgurupelajaran');
    }
}
