<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Murid;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $guru = Guru::all()->count();
        $murid = Murid::all()->count();
        $pelajaran = Pelajaran::where('muatan', 'pelajaran')->orwhere('muatan', 'lokal')->count();
        $ekstrakulikuler = Pelajaran::where('muatan', 'ekstrakulikuler')->count();

        return view('dashboard', compact('guru', 'murid', 'pelajaran', 'ekstrakulikuler'));
    }
}
