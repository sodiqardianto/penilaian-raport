<?php

namespace App\Http\Controllers;

use App\Models\Kelasmurid;
use App\Models\Kelas;
use App\Models\Murid;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KelasmuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $kelasmurid = Kelasmurid::all();
        //dd($walikelas);
        return DataTables::of($kelasmurid)
            ->addIndexColumn()
            ->addColumn('kelas',function($kelasmurid){
                return $kelasmurid->kelas->kelas;
            })
            ->addColumn('murid',function($kelasmurid){
                return $kelasmurid->murid->namamurid;
            })
            ->addColumn('action', function ($kelasmurid) {
                if ($kelasmurid->id == 1) {
                    $delete = '<button data-id="' . $kelasmurid->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                } else {
                    $delete = '<button data-id="' . $kelasmurid->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                }
                $edit = '<a href="' . route('kelasmurid.edit', $kelasmurid->id) . '" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>';
                return $edit . ' ' . $delete;
            })
            ->make(true);
    }

    public function index()
    {
        return view('kelasmurid.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $murid = Murid::all();
        return view('kelasmurid.create',compact('kelas','murid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'idkelas' => 'required',
            'idmurid' => 'required',
        ]);

        // Membuat record baru di table semester
        $data = Kelasmurid::create([
            'idkelas' => $request->idkelas,
            'idmurid' => $request->idmurid,
        ]);

        if ($data) {
            return redirect()->route('kelasmurid.index')->with('success', 'Data Kelas Murid Berhasil Ditambahkan');
        } else {
            return redirect()->route('kelasmurid.create')->with('error', 'Data Kelas Murid Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelasmurid  $kelasmurid
     * @return \Illuminate\Http\Response
     */
    public function show(Kelasmurid $kelasmurid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelasmurid  $kelasmurid
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelasmurid $kelasmurid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelasmurid  $kelasmurid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelasmurid $kelasmurid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelasmurid  $kelasmurid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelasmurid $kelasmurid)
    {
        //
    }
}
