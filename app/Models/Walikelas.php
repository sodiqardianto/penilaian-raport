<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Guru;

class Walikelas extends Model
{
    use HasFactory;

    protected $table = 'walikelas';

    protected $fillable = [
        'idkelas', 'idguru',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'idkelas');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class,'idguru');
    }
}
