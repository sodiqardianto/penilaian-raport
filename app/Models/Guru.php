<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = ['namaguru', 'notelp'];

    protected $table = 'guru';

    public function walikelas()
    {
        return $this->hasMany('App\Walikelas');
    }

    public function gurupelajaran()
    {
        return $this->hasMany('App\Gurupelajaran');
    }
}
