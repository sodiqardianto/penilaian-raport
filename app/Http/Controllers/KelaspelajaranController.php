<?php

namespace App\Http\Controllers;

use App\Models\Kelaspelajaran;
use App\Models\Kelas;
use App\Models\Gurupelajaran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class KelaspelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $kelaspelajaran = Kelaspelajaran::all();
        //dd($walikelas);
        return DataTables::of($kelaspelajaran)
            ->addIndexColumn()
            ->addColumn('kelas',function($kelaspelajaran){
                return $kelaspelajaran->kelas->kelas;
            })
            ->addColumn('guru',function($kelaspelajaran){
                return $kelaspelajaran->gurupelajaran->guru->namaguru;
            })
            ->addColumn('pelajaran',function($kelaspelajaran){
                return $kelaspelajaran->gurupelajaran->pelajaran->namamatapelajaran;
            })
            ->addColumn('action', function ($kelaspelajaran) {
                if ($kelaspelajaran->id == 1) {
                    $delete = '<button data-id="' . $kelaspelajaran->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                } else {
                    $delete = '<button data-id="' . $kelaspelajaran->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                }
                $edit = '<a href="' . route('kelaspelajaran.edit', $kelaspelajaran->id) . '" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>';
                return $edit . ' ' . $delete;
            })
            ->make(true);
    }

    public function index()
    {
        return view('kelaspelajaran.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $gurupelajaran = Gurupelajaran::all();
        return view('kelaspelajaran.create',compact('kelas','gurupelajaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = kelaspelajaran::where('idkelas',$request->idkelas)->where('idgurupelajaran',$request->idgurupelajaran)->count();
        if ($data>0) {
            return redirect()->route('kelaspelajaran.create')->with('error', 'Data Kelas Pelajaran Gagal Diubah / Data Sudah Ada');
        }
        $this->validate($request, [
            'idkelas' => 'required',
            'idgurupelajaran' => 'required',
        ]);

        // Membuat record baru di table semester
        $data = Kelaspelajaran::create([
            'idkelas' => $request->idkelas,
            'idgurupelajaran' => $request->idgurupelajaran,
        ]);

        if ($data) {
            return redirect()->route('kelaspelajaran.index')->with('success', 'Data Kelas Pelajaran Berhasil Ditambahkan');
        } else {
            return redirect()->route('kelaspelajaran.create')->with('error', 'Data Kelas Pelajaran Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelaspelajaran  $kelaspelajaran
     * @return \Illuminate\Http\Response
     */
    public function show(Kelaspelajaran $kelaspelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelaspelajaran  $kelaspelajaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelaspelajaran $kelaspelajaran)
    {
        $kelas = Kelas::all();
        $gurupelajaran = Gurupelajaran::all();
        return view('kelaspelajaran.create',compact('kelas','gurupelajaran','kelaspelajaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelaspelajaran  $kelaspelajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelaspelajaran $kelaspelajaran)
    {
        if ($request->idkelas == $kelaspelajaran->idkelas && $request->idgurupelajaran == $kelaspelajaran->idgurupelajaran) {
            return redirect()->route('kelaspelajaran.edit')->with('error', 'Data Kelas Pelajaran Gagal Diubah / Data Sudah Ada');
        }else{
            $this->validate($request, [
                'idkelas' => 'required',
                'idgurupelajaran' => 'required',
            ]);
        }
        $data = kelaspelajaran::findOrFail($kelaspelajaran->id);
        
        // Mengupdate data semester
        $data->update([
            'idkelas' => $request->idkelas,
            'idgurupelajaran' => $request->idgurupelajaran,
        ]);

        if ($data) {
            return redirect()->route('kelaspelajaran.index')->with('success', 'Data Kelas Pelajaran Berhasil Diubah');
        } else {
            return redirect()->route('kelaspelajaran.edit')->with('error', 'Data Kelas Pelajaran Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelaspelajaran  $kelaspelajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelaspelajaran $kelaspelajaran)
    {
        $kelaspelajaran->delete();
        return response()->json(['success' => 'Data Kelas Pelajaran Berhasil Dihapus']);
    }
}
