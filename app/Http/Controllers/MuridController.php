<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MuridController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-murid', ['only' => ['create', 'store']]);
        $this->middleware('permission:view-murid', ['only' => ['index']]);
        $this->middleware('permission:edit-murid', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-murid', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $murid = Murid::all();
        return DataTables::of($murid)
            ->addIndexColumn()
            ->addColumn('action', function ($murid) {
                if ($murid->id == 1) {
                    $delete = '<button data-id="' . $murid->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                } else {
                    $delete = '<button data-id="' . $murid->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                }
                $edit = '<a href="' . route('murid.edit', $murid->id) . '" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>';
                return $edit . ' ' . $delete;
            })
            ->addColumn('jeniskelaminstr', function ($murid) {
                if ($murid->jeniskelamin == 0) {
                    $data = 'Perempuan';
                } else {
                    $data = 'Laki Laki';
                }
                return $data;
            })
            ->make(true);
    }

    public function index()
    {
        return view('murid.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('murid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, array(
            'name' => 'required',
            'notelp' => 'required'
        ));

        $murid = Murid::create([
            'namamurid' => $request->name,
            'notelp' => $request->notelp,
            'jeniskelamin' => $request->jk
        ]);

        if ($murid) {
            return redirect()->route('murid.index')->with('success', 'Murid berhasil dibuat');
        } else {
            return redirect()->route('murid.create')->with('error', 'Murid gagal dibuat');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function show(Murid $murid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function edit(Murid $murid)
    {
        return view('murid.edit', compact('murid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Murid $murid)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'notelp' => 'required',
            'jk' => 'required'
        ]);

        $data = Murid::findOrFail($murid->id);
        $data->namamurid = $validatedData['name'];
        $data->notelp = $validatedData['notelp'];
        $data->jeniskelamin = $validatedData['jk'];
        $data->save();

        if ($data) {
            return redirect()->route('murid.index')->with('success', 'Murid berhasil diubah');
        } else {
            return redirect()->route('murid.create')->with('error', 'Murid gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Murid $murid)
    {
        //$muriddata = User::findOrFail($murid->id);
        $murid->delete();

        return response()->json(['success' => 'Data Murid Berhasil Dihapus']);
    }
}
