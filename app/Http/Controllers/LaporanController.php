<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Kelasmurid;
use App\Models\Murid;
use App\Models\Pelajaran;
use App\Models\Raport;
use App\Models\Semester;
use App\Models\Walikelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $kelas = Kelasmurid::select('idkelas')->groupBy('idkelas')->get();
        return DataTables::of($kelas)
            ->addIndexColumn()
            ->addColumn('kelas', function ($kelas) {
                return $kelas->kelas->kelas;
            })
            ->addColumn('action', function ($kelas) {
                $edit = '<a href="' . route('laporan.show', $kelas->idkelas) . '" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i> Masuk</a>';
                return $edit;
            })
            ->make(true);
    }

    public function datamurid($id)
    {

        $kelas = Kelasmurid::where('idkelas', $id)->get();
        return DataTables::of($kelas)
            ->addIndexColumn()
            ->addColumn('murid', function ($kelas) {
                return $kelas->murid->namamurid;
            })
            ->addColumn('action', function ($kelas) {
                $currentMonth = Carbon::now()->month;

                if ($currentMonth >= 1 && $currentMonth <= 6) {
                    // kode yang akan dieksekusi jika bulan saat ini adalah Januari sampai Juni
                    $semester = Semester::where('tahun', '=', date('Y'))->where('semester', 1)->first();
                } else {
                    $semester = Semester::where('tahun', '=', date('Y'))->where('semester', 2)->first();
                }
                $edit = '<a href="' .  url("export/$kelas->idmurid/$semester->id")  . '" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i> Cetak</a>';
                return $edit;
            })
            ->make(true);
    }

    public function index()
    {
        return view('laporan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export($id, $semester)
    {
        $murid = Murid::where('id', $id)->first();
        $semester  = Semester::where('id', $semester)->first();
        $sikap = Raport::where('idmurid', $murid->id)->where('idsemester', $semester->id)->wherein('idpelajaran', [1, 2])->get();

        $pengetahuanpelajaran = Raport::rightjoin('pelajaran', 'raport.idpelajaran', '=', 'pelajaran.id')
            ->where('pelajaran.muatan', 'pelajaran')->get();

        $pengetahuanlokal = Raport::rightjoin('pelajaran', 'raport.idpelajaran', '=', 'pelajaran.id')
            ->where('pelajaran.muatan', 'lokal')->get();

        $muridkelas = Walikelas::select('kelasmurid.idkelas', 'walikelas.idguru', 'kelas.kelas')
            ->join('kelasmurid', 'kelasmurid.idkelas', '=', 'walikelas.idkelas')
            ->join('kelas', 'kelasmurid.idkelas', '=', 'kelas.id')
            ->where('kelasmurid.idmurid', $id)->first();


        $ekstrakulikuler = Pelajaran::leftjoin('raport', 'raport.idpelajaran', '=', 'pelajaran.id')
            ->where('pelajaran.muatan', 'ekstrakulikuler')
            ->get();

        $absen = Absen::where('idmurid', $id)->first();
        $catatan = Raport::where('idmurid', $id)->where('idkategorinilai', 5)->first();
        // dd($absen
        // dd($murid, $id);
        return view('laporan.export', compact('murid', 'muridkelas', 'semester', 'sikap', 'absen', 'catatan', 'pengetahuanpelajaran', 'pengetahuanlokal', 'ekstrakulikuler'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('laporan.murid', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
