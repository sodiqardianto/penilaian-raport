<?php

namespace App\Http\Controllers;

use App\Models\Raport;
use App\Models\Kategori;
use App\Models\Kelasmurid;
use App\Models\Pelajaran;
use App\Models\Semester;
use App\Models\Walikelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class EkstrakulikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $user = Auth::user();
        $id = $user->load('guru')->guru[0]->id;
        $idkelas =  Walikelas::where('idguru', $id)->select('idkelas')->first();
        $sikap = Raport::join('kelasmurid', 'raport.idmurid', '=', 'kelasmurid.idmurid')
            ->select('raport.id',  'raport.idsemester', 'raport.idpelajaran', 'raport.idkategorinilai', 'raport.nilai', 'raport.deskripsi', 'kelasmurid.idkelas', 'kelasmurid.idmurid')
            ->where('kelasmurid.idkelas', $idkelas->idkelas)
            ->wherein('raport.idkategorinilai', [4])
            ->get();
        // dd($sikap);
        return DataTables::of($sikap)
            ->addIndexColumn()
            ->addColumn('murid', function ($sikap) {
                return $sikap->murid->namamurid;
            })
            ->addColumn('pelajaran', function ($sikap) {
                if ($sikap->idpelajaran != null) {
                    return $sikap->pelajaran->namamatapelajaran;
                } else {
                    return '';
                }
            })
            ->addColumn('semesterstr', function ($sikap) {
                if ($sikap->idsemester != null) {
                    return $sikap->semester->semester == 1 ? 'Ganjil ' . $sikap->semester->tahun : 'Genap ' . $sikap->semester->tahun;
                } else {
                    return '';
                }
            })
            ->addColumn('predikat', function ($sikap) {
                if ($sikap->nilai != null) {
                    return $this->predikat($sikap->nilai);
                } else {
                    return '';
                }
            })
            ->addColumn('action', function ($sikap) {
                if ($sikap->id != null) {
                    $delete = '<button data-id="' . $sikap->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                } else {
                    $delete = '';
                }
                // $edit = '<a href="' . route('sikap.edit', $sikap->id) . '" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>';
                // return $edit . ' ' . $delete;
                return $delete;
            })
            ->make(true);
    }
    public function index()
    {
        return view('ekstrakulikuler.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $id = $user->load('guru')->guru[0]->id;
        $idkelas =  Walikelas::where('idguru', $id)->select('idkelas')->first();
        $murid = Kelasmurid::where('idkelas', '=', $idkelas->idkelas)->get();
        $kategori = Kategori::wherein('id', [4])->first();
        $muatan = Pelajaran::where('muatan', 'ekstrakulikuler')->get();
        $currentMonth = Carbon::now()->month;
        if ($currentMonth >= 1 && $currentMonth <= 6) {
            // kode yang akan dieksekusi jika bulan saat ini adalah Januari sampai Juni
            $semester = Semester::where('tahun', '=', date('Y'))->where('semester', 1)->get();
        } else {
            $semester = Semester::where('tahun', '=', date('Y'))->where('semester', 2)->get();
        }
        return view('ekstrakulikuler.create', compact('murid', 'semester', 'muatan', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Raport::where('idmurid', $request->idmurid)
            ->where('idsemester', $request->idsemester)
            ->where('idpelajaran', $request->idpelajaran)
            ->where('idkategorinilai', $request->idkategorinilai)
            ->count();
        if ($data > 0) {
            return redirect()->route('ekstrakulikuler.create')->with('error', 'Data Nilai Gagal Diubah / Data Sudah Ada');
        }

        $this->validate($request, [
            'idmurid' => 'required',
            'idpelajaran' => 'required',
            'idkategorinilai' => 'required',
            'idsemester' => 'required',
            'nilai' => 'required',
            'deskripsi' => 'required',

        ]);

        // Membuat record baru di table semester
        $data = Raport::create([
            'idmurid' => $request->idmurid,
            'idpelajaran' => $request->idpelajaran,
            'idkategorinilai' => $request->idkategorinilai,
            'idsemester' => $request->idsemester,
            'nilai' => $request->nilai,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($data) {
            return redirect()->route('ekstrakulikuler.index')->with('success', 'Data Nilai Berhasil Ditambahkan');
        } else {
            return redirect()->route('ekstrakulikuler.create')->with('error', 'Data Nilai Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $raport = Raport::findorfail($id);
        $raport->delete();
        return response()->json(['success' => 'Nilai berhasil dihapus']);
    }

    public function predikat($nilai)
    {
        if ($nilai > 89 && $nilai <= 100) {
            return 'A';
        } else if ($nilai > 79 && $nilai <= 89) {
            return 'B';
        } else if ($nilai > 69 && $nilai <= 79) {
            return 'C';
        } else if ($nilai > 59 && $nilai <= 69) {
            return 'D';
        } else if ($nilai <= 59) {
            return 'E';
        }
    }
}
