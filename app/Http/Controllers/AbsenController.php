<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Guru;
use App\Models\Kelasmurid;
use App\Models\Semester;
use App\Models\Walikelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        if (Auth::user()->load('roles')->name == 'admin') {
            $absen = Absen::join('kelasmurid', 'absen.idmurid', '=', 'kelasmurid.idmurid')
                ->select('absen.id',  'absen.idsemester',  'absen.alpha', 'absen.sakit', 'absen.izin', 'kelasmurid.idkelas', 'kelasmurid.idmurid')
                ->get();
        } else {
            $user = Auth::user();
            $id = Guru::where('iduser', $user->id)->first();
            $idkelas =  Walikelas::where('idguru', $id->id)->select('idkelas')->first();
            $absen = Absen::join('kelasmurid', 'absen.idmurid', '=', 'kelasmurid.idmurid')
                ->select('absen.id',  'absen.idsemester',  'absen.alpha', 'absen.sakit', 'absen.izin', 'kelasmurid.idkelas', 'kelasmurid.idmurid')
                ->where('kelasmurid.idkelas', $idkelas->idkelas)->get();
        }
        // dd($absen);
        return DataTables::of($absen)
            ->addIndexColumn()
            ->addColumn('murid', function ($absen) {

                return $absen->murid->namamurid;
            })
            ->addColumn('semesterstr', function ($absen) {
                if ($absen->idsemester != null) {
                    return $absen->semester->semester;
                } else {
                    return '';
                }
            })
            ->addColumn('action', function ($absen) {
                if ($absen->id != null) {
                    $delete = '<button data-id="' . $absen->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                } else {
                    $delete = '';
                }
                // $edit = '<a href="' . route('absen.edit', $absen->id) . '" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>';
                // return $edit . ' ' . $delete;
                return $delete;
            })
            ->make(true);
    }

    public function index()
    {

        return view('absen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->load('roles')->name != 'admin') {
            $user = Auth::user();
            $id = Guru::where('iduser', $user->id)->first();
            $idkelas =  Walikelas::where('idguru', $id)->select('idkelas')->first();
            $murid = Kelasmurid::where('idkelas', '=', $idkelas->idkelas)->get();
        } else {
            $murid = Kelasmurid::all();
        }
        $currentMonth = Carbon::now()->month;

        if ($currentMonth >= 1 && $currentMonth <= 6) {
            // kode yang akan dieksekusi jika bulan saat ini adalah Januari sampai Juni
            $semester = Semester::where('tahun', '=', date('Y'))->where('semester', 1)->get();
        } else {
            $semester = Semester::where('tahun', '=', date('Y'))->where('semester', 2)->get();
        }

        return view('absen.create', compact('id', 'murid', 'semester'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Absen::where('idmurid', $request->idmurid)
            ->where('idsemester', $request->idsemester)
            ->count();
        if ($data > 0) {
            return redirect()->route('absen.create')->with('error', 'Data Absen Gagal Diubah / Data Sudah Ada');
        }

        $this->validate($request, [
            'idmurid' => 'required',
            'idsemester' => 'required',
            'izin' => 'required',
            'alpha' => 'required',
            'sakit' => 'required',

        ]);

        // Membuat record baru di table semester
        $data = Absen::create([
            'idmurid' => $request->idmurid,
            'idsemester' => $request->idsemester,
            'izin' => $request->izin,
            'alpha' => $request->alpha,
            'sakit' => $request->sakit,
        ]);

        if ($data) {
            return redirect()->route('absen.index')->with('success', 'Data Absen Berhasil Ditambahkan');
        } else {
            return redirect()->route('absen.create')->with('error', 'Data Absen Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $absen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $absen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        $absen->delete();
        return response()->json(['success' => 'Nilai berhasil dihapus']);
    }
}
