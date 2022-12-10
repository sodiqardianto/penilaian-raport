<?php

namespace App\Http\Controllers;

use App\Models\Pelajaran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $pelajaran = Pelajaran::all();
        return DataTables::of($pelajaran)
            ->addIndexColumn()
            ->addColumn('action', function ($pelajaran) {
                if ($pelajaran->id == 1) {
                    $delete = '<button data-id="' . $pelajaran->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                } else {
                    $delete = '<button data-id="' . $pelajaran->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                }
                $edit = '<a href="' . route('pelajaran.edit', $pelajaran->id) . '" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>';
                return $edit . ' ' . $delete;
            })
            ->make(true);
    }

    public function index()
    {
        return view('pelajaran.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirim
        $this->validate($request, [
            'namamatapelajaran' => 'required',
        ]);

        // Membuat record baru di table pelajaran
        $data = Pelajaran::create([
            'namamatapelajaran' => $request->namamatapelajaran,
        ]);

        if ($data) {
            return redirect()->route('pelajaran.index')->with('success', 'Data Pelajaran Berhasil Ditambahkan');
        } else {
            return redirect()->route('pelajaran.create')->with('error', 'Data Pelajaran Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pelajaran $pelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelajaran $pelajaran)
    {
        return view('pelajaran.edit', compact('pelajaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelajaran $pelajaran)
    {
        // Mencari record pelajaran berdasarkan ID yang diberikan
        $data = Pelajaran::findOrFail($id);

        // Validasi data yang dikirim
        $this->validate($request, [
            'namamatapelajaran' => 'required',
        ]);

        // Mengupdate data pelajaran
        $data->update([
            'namamatapelajaran' => $request->namamatapelajaran,
        ]);

        if ($data) {
            return redirect()->route('pelajaran.index')->with('success', 'Data Pelajaran Berhasil Diubah');
        } else {
            return redirect()->route('pelajaran.create')->with('error', 'Data Pelajaran Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelajaran  $pelajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelajaran $pelajaran)
    {
         // Mencari record pelajaran berdasarkan ID yang diberikan
         //$data = Pelajaran::findOrFail($pelajaran->id);

         // Menghapus data pelajaran
         $pelajaran->delete();
         return response()->json(['success' => 'Data Pelajaran Berhasil Dihapus']);
        
    }
}
