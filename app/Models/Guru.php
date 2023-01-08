<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Guru extends Model
{
    use HasFactory;

    protected $fillable = ['namaguru', 'notelp', 'iduser'];

    protected $table = 'guru';

    public function walikelas()
    {
        return $this->hasMany('App\Walikelas');
    }

    public function gurupelajaran()
    {
        return $this->hasMany('App\Gurupelajaran');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }
}
