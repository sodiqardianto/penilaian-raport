<?php

namespace App\Http\Controllers;

use App\Models\Gurupelajaran;
use App\Models\Pelajaran;
use App\Models\Guru;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GurupelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $gurupelajaran = Gurupelajaran::all();
        //dd($walikelas);
        return DataTables::of($gurupelajaran)
            ->addIndexColumn()
            ->addColumn('pelajaran', function ($gurupelajaran) {
                return $gurupelajaran->pelajaran->namamatapelajaran;
            })
            ->addColumn('guru', function ($gurupelajaran) {
                return $gurupelajaran->guru->namaguru;
            })
            ->addColumn('action', function ($gurupelajaran) {
                if ($gurupelajaran->id == 1) {
                    $delete = '<button data-id="' . $gurupelajaran->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                } else {
                    $delete = '<button data-id="' . $gurupelajaran->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                }
                $edit = '<a href="' . route('gurupelajaran.edit', $gurupelajaran->id) . '" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>';
                return $edit . ' ' . $delete;
            })
            ->make(true);
    }

    public function index()
    {
        return view('gurupelajaran.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelajaran = Pelajaran::where('muatan', 'pelajaran')->orwhere('muatan', 'lokal')->get();
        $guru = Guru::all();
        return view('gurupelajaran.create', compact('pelajaran', 'guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Gurupelajaran::where('idpelajaran', '=', $request->idpelajaran)->where('idguru', '=', $request->idguru)->count();

        if ($data > 0) {
            return redirect()->route('gurupelajaran.create')->with('error', 'Data Guru Pelajaran Gagal Ditambahkan');
        }

        $this->validate($request, [
            'idguru' => 'required',
            'idpelajaran' => 'required',
        ]);

        // Membuat record baru di table semester
        $data = Gurupelajaran::create([
            'idpelajaran' => $request->idpelajaran,
            'idguru' => $request->idguru,
        ]);

        if ($data) {
            return redirect()->route('gurupelajaran.index')->with('success', 'Data Guru Pelajaran Berhasil Ditambahkan');
        } else {
            return redirect()->route('gurupelajaran.create')->with('error', 'Data Guru Pelajaran Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gurupelajaran  $gurupelajaran
     * @return \Illuminate\Http\Response
     */
    public function show(Gurupelajaran $gurupelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gurupelajaran  $gurupelajaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Gurupelajaran $gurupelajaran)
    {
        $pelajaran = Pelajaran::all();
        $guru = Guru::all();
        return view('gurupelajaran.edit', compact('pelajaran', 'guru', 'gurupelajaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gurupelajaran  $gurupelajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gurupelajaran $gurupelajaran)
    {
        if ($request->idpelajaran == $gurupelajaran->idpelajaran && $request->idguru == $gurupelajaran->idguru) {
            return redirect()->route('gurupelajaran.edit', $gurupelajaran->id)->with('error', 'Data Guru Pelajaran Gagal Diubah / Data Sudah Ada');
        }

        $this->validate($request, [
            'idpelajaran' => 'required',
            'idguru' => 'required',
        ]);


        $data = Gurupelajaran::findOrFail($gurupelajaran->id);
        // Mengupdate data semester
        $data->update([
            'idpelajaran' => $request->idpelajaran,
            'idguru' => $request->idguru,
        ]);

        if ($data) {
            return redirect()->route('gurupelajaran.index')->with('success', 'Data Guru Pelajaran Berhasil Diubah');
        } else {
            return redirect()->route('gurupelajaran.edit', $gurupelajaran->id)->with('error', 'Data Guru Pelajaran Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gurupelajaran  $gurupelajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gurupelajaran $gurupelajaran)
    {
        $gurupelajaran->delete();

        return response()->json(['success' => 'Data Guru Pelajaran Berhasil Dihapus']);
    }
}
