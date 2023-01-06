<?php

namespace App\Http\Controllers;

use App\Models\Raport;
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
    public function data()
    {

        if (session_name('role')) {
        }
        $raport = Raport::all();
        //dd($walikelas);
        return DataTables::of($raport)
            ->addIndexColumn()
            ->addColumn('kelas', function ($raport) {
                return $raport->murid->namamurid;
            })
            ->addColumn('guru', function ($raport) {
                return $raport->kategori->namakategorinilai;
            })
            ->addColumn('semesterstr', function ($raport) {
                return $raport->gurupelajaran->semester->semester;
            })
            ->addColumn('pelajaran', function ($raport) {
                return $raport->pelajaran->namamatapelajaran;
            })
            ->addColumn('action', function ($raport) {
                if ($raport->id == 1) {
                    $delete = '<button data-id="' . $raport->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                } else {
                    $delete = '<button data-id="' . $raport->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                }
                $edit = '<a href="' . route('raport.edit', $raport->id) . '" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>';
                return $edit . ' ' . $delete;
            })
            ->make(true);
    }

    public function index()
    {
        $user = Auth::user();
        $role = $user->role;
        dd($role);
        return view('raport.index');
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
        //
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
    public function edit(Raport $raport)
    {
        //
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
        //
    }
}
