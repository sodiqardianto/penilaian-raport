<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Murid;

class Kelasmurid extends Model
{
    use HasFactory;

    protected $table = 'kelasmurid';

    protected $fillable = [
        'idkelas', 'idmurid',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'idkelas');
    }

    public function murid()
    {
        return $this->belongsTo(Murid::class,'idmurid');
    }
}
