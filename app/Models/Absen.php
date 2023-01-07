<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Murid;
use App\Models\Semester;

class Absen extends Model
{
    use HasFactory;

    protected $fillable = ['idsemester', 'idmurid', 'sakit', 'izin', 'alpha'];

    protected $table = 'absen';

    public function murid()
    {
        return $this->belongsTo(Murid::class, 'idmurid');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'idsemester');
    }
}
