<?php

namespace App\Http\Controllers;

use App\Models\Gurupelajaran;
use App\Models\Kategori;
use App\Models\Kelasmurid;
use App\Models\Kelaspelajaran;
use App\Models\Murid;
use App\Models\Raport;
use App\Models\Semester;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RaportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data($id)
    {

        $raport = Raport::rightjoin('kelasmurid', 'raport.idmurid', '=', 'kelasmurid.idmurid')
            ->select('raport.id', 'raport.idkategorinilai', 'raport.idsemester', 'raport.idpelajaran', 'raport.nilai', 'raport.deskripsi', 'kelasmurid.idkelas', 'kelasmurid.idmurid')
            ->where('kelasmurid.idkelas', $id)->get();
        //dd($walikelas);
        return DataTables::of($raport)
            ->addIndexColumn()
            ->addColumn('murid', function ($raport) {
                if ($raport->idmurid != null) {
                    return $raport->murid->namamurid;
                } else {
                    return '';
                }
            })
            ->addColumn('kategori', function ($raport) {
                if ($raport->idkategori != null) {
                    return $raport->kategori->namakategorinilai;
                } else {
                    return '';
                }
            })
            ->addColumn('semesterstr', function ($raport) {
                if ($raport->idsemester != null) {
                    return $raport->semester->semester;
                } else {
                    return '';
                }
            })
            ->addColumn('pelajaran', function ($raport) {
                if ($raport->idpelajaran != null) {
                    return $raport->pelajaran->namamatapelajaran;
                } else {
                    return '';
                }
            })
            ->addColumn('action', function ($raport) {
                if ($raport->id != null) {
                    $delete = '<button data-id="' . $raport->idmurid . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                    // $edit = '<a href="' . route('raport.edit', $raport->idmurid) . '" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>';
                } else {
                    $delete = '';
                    // $edit = '';
                }
                // return $edit . ' ' . $delete;
                return $delete;
            })
            ->make(true);
    }

    public function datakelas()
    {
        $user = Auth::user();
        $id = $user->load('guru')->guru[0]->id;
        $kelaspelajaran = Kelaspelajaran::join('gurupelajaran', 'kelaspelajaran.idgurupelajaran', '=', 'gurupelajaran.id')->where('gurupelajaran.idguru', '=', $id)->get();
        //dd($walikelas);
        return DataTables::of($kelaspelajaran)
            ->addIndexColumn()
            ->addColumn('kelas', function ($kelaspelajaran) {
                return $kelaspelajaran->kelas->kelas;
            })
            ->addColumn('guru', function ($kelaspelajaran) {
                return $kelaspelajaran->gurupelajaran->guru->namaguru;
            })
            ->addColumn('pelajaran', function ($kelaspelajaran) {
                return $kelaspelajaran->gurupelajaran->pelajaran->namamatapelajaran;
            })
            ->addColumn('action', function ($kelaspelajaran) {

                $edit = '<a href="' . route('raport.kelas', $kelaspelajaran->id) . '" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i> Masuk</a>';
                return $edit;
            })
            ->make(true);
    }

    public function index()
    {
        return view('raport.kelas');
    }

    public function kelasreport($id)
    {
        $user = Auth::user();
        $role = $user->role;
        //dd($role);
        return view('raport.index', compact('id'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            return redirect()->route('raport.edit', $request->idraport)->with('error', 'Data Nilai Gagal Diubah / Data Sudah Ada');
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
            return redirect()->route('raport.kelas', $request->idraport)->with('success', 'Data Nilai Berhasil Ditambahkan');
        } else {
            return redirect()->route('raport.edit', $request->idraport)->with('error', 'Data Nilai Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Raport  $raport
     * @return \Illuminate\Http\Response
     */
    public function show(Raport $raport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Raport  $raport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $murid = Kelasmurid::where('idkelas', '=', $id)->get();
        $pelajaran = Gurupelajaran::where('idguru', '=', auth::user()->load('guru')->guru[0]->id)->first();
        $currentMonth = Carbon::now()->month;

        if ($currentMonth >= 1 && $currentMonth <= 6) {
            // kode yang akan dieksekusi jika bulan saat ini adalah Januari sampai Juni
            $semester = Semester::where('tahun', '=', date('Y'))->where('semester', 1)->get();
        } else {
            $semester = Semester::where('tahun', '=', date('Y'))->where('semester', 2)->get();
        }
        $kategori = Kategori::wherein('id', [2, 3])->get();
        return view('raport.edit', compact('id', 'murid', 'pelajaran', 'semester', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Raport  $raport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Raport $raport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Raport  $raport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Raport $raport)
    {
        $raport->delete();
        return response()->json(['success' => 'Nilai berhasil dihapus']);
    }
}
