<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelajaran;
use App\Models\Guru;

class Gurupelajaran extends Model
{
    use HasFactory;

    protected $table = 'gurupelajaran';

    protected $fillable = [
        'idpelajaran', 'idguru',
    ];

    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class,'idpelajaran');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class,'idguru');
    }
}
