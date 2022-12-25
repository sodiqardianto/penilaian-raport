<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $kelas = Kelas::all();
        return DataTables::of($kelas)
            ->addIndexColumn()
            ->addColumn('action', function ($kelas) {
                if ($kelas->id == 1) {
                    $delete = '<button data-id="' . $kelas->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                } else {
                    $delete = '<button data-id="' . $kelas->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                }
                $edit = '<a href="' . route('kelas.edit', $kelas->id) . '" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>';
                return $edit . ' ' . $delete;
            })
            ->make(true);
    }

    public function index()
    {
        return view('kelas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.create');
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
            'kelas' => 'required',
        ]);

        // Membuat record baru di table semester
        $data = Kelas::create([
            'kelas' => $request->kelas,
        ]);

        if ($data) {
            return redirect()->route('kelas.index')->with('success', 'Data Kelas Berhasil Ditambahkan');
        } else {
            return redirect()->route('kelas.create')->with('error', 'Data Kelas Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $data = kelas::findOrFail($kelas->id);

        // Validasi data yang dikirim
        $this->validate($request, [
            'kelas' => 'required',
        ]);

        // Mengupdate data semester
        $data->update([
            'kelas' => $request->kelas,
        ]);

        if ($data) {
            return redirect()->route('kelas.index')->with('success', 'Data Kelas Berhasil Diubah');
        } else {
            return redirect()->route('kelas.edit')->with('error', 'Data Kelas Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return response()->json(['success' => 'Data Kelas Berhasil Dihapus']);
    }
}
