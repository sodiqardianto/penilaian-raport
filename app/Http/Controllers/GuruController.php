<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $guru = Guru::all();
        return DataTables::of($guru)
            ->addIndexColumn()
            ->addColumn('action', function ($guru) {
                if ($guru->id == 1) {
                    $delete = '<button data-id="' . $guru->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                } else {
                    $delete = '<button data-id="' . $guru->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                }
                $edit = '<a href="' . route('guru.edit', $guru->id) . '" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>';
                return $edit . ' ' . $delete;
            })
            ->make(true);
    }

    public function index()
    {
        return view('guru.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
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
            'namaguru' => 'required',
            'notelp' => 'required',
        ]);

        // Membuat record baru di table guru
        $data=Guru::create([
            'namaguru' => $request->namaguru,
            'notelp' => $request->notelp,
        ]);
        if ($data) {
            return redirect()->route('guru.index')->with('success', 'Data Guru Berhasil Ditambahkan');
        } else {
            return redirect()->route('guru.create')->with('error', 'Data Guru Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        // Mencari record guru berdasarkan ID yang diberikan
        $data = Guru::findOrFail($guru->id);

        // Validasi data yang dikirim
        $this->validate($request, [
            'namaguru' => 'required',
            'notelp' => 'required',
        ]);

        // Mengupdate data guru
        $data->update([
            'namaguru' => $request->namaguru,
            'notelp' => $request->notelp,
        ]);

        if ($data) {
            return redirect()->route('guru.index')->with('success', 'Data Guru Berhasil Diubah');
        } else {
            return redirect()->route('guru.create')->with('error', 'Data Guru Gagal Diubah');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        /// Mencari record guru berdasarkan ID yang diberikan
        //$data = Guru::findOrFail($guru->id);

        // Menghapus data guru
        $guru->delete();

        return response()->json(['success' => 'Data Guru Berhasil Dihapus']);
    }
}
