<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $kategori = Kategori::all();
        return DataTables::of($kategori)
            ->addIndexColumn()
            ->addColumn('action', function ($kategori) {
                if ($kategori->id == 1) {
                    $delete = '<button data-id="' . $kategori->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                } else {
                    $delete = '<button data-id="' . $kategori->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                }
                $edit = '<a href="' . route('kategori.edit', $kategori->id) . '" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>';
                return $edit . ' ' . $delete;
            })
            ->make(true);
    }

    public function index()
    {
        return view('kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'namakategorinilai' => 'required|unique:kategorinilai',
        ]);

        // Membuat record baru di table semester
        $data = Kategori::create([
            'namakategorinilai' => $request->namakategorinilai,
        ]);

        if ($data) {
            return redirect()->route('kategori.index')->with('success', 'Data Kategori Berhasil Ditambahkan');
        } else {
            return redirect()->route('kategori.create')->with('error', 'Data Kategori Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $data = Kategori::findOrFail($kategori->id);

        // Validasi data yang dikirim
        $this->validate($request, [
            'namakategorinilai' => 'required|unique:kategorinilai',
        ]);

        // Mengupdate data semester
        $data->update([
            'namakategorinilai' => $request->namakategorinilai,
        ]);

        if ($data) {
            return redirect()->route('kategori.index')->with('success', 'Data Kategori Berhasil Diubah');
        } else {
            return redirect()->route('kategori.edit')->with('error', 'Data Kategori Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return response()->json(['success' => 'Data Kategori Berhasil Dihapus']);
    }
}
