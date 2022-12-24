<?php

namespace App\Http\Controllers;

use App\Models\Walikelas;
use App\Models\Kelas;
use App\Models\Guru;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WalikelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $walikelas = Walikelas::all();
        //dd($walikelas);
        return DataTables::of($walikelas)
            ->addIndexColumn()
            ->addColumn('kelas',function($walikelas){
                return $walikelas->kelas->kelas;
            })
            ->addColumn('namaguru',function($walikelas){
                return $walikelas->guru->namaguru;
            })
            ->addColumn('action', function ($walikelas) {
                if ($walikelas->id == 1) {
                    $delete = '<button data-id="' . $walikelas->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                } else {
                    $delete = '<button data-id="' . $walikelas->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                }
                $edit = '<a href="' . route('walikelas.edit', $walikelas->id) . '" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>';
                return $edit . ' ' . $delete;
            })
            ->make(true);
    }

    public function index()
    {
        return view('walikelas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $guru = Guru::all();
        return view('walikelas.create',compact('kelas','guru'));
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
            'idguru' => 'required',
        ]);

        // Membuat record baru di table semester
        $data = Walikelas::create([
            'idkelas' => $request->idkelas,
            'idguru' => $request->idguru,
        ]);

        if ($data) {
            return redirect()->route('walikelas.index')->with('success', 'Data Wali Kelas Berhasil Ditambahkan');
        } else {
            return redirect()->route('walikelas.create')->with('error', 'Data Wali Kelas Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Walikelas  $walikelas
     * @return \Illuminate\Http\Response
     */
    public function show(Walikelas $walikelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Walikelas  $walikelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = Walikelas::findOrFail($id);
        $kelas = Kelas::all();
        $guru = Guru::all();
        //dd($id);
        return view('walikelas.edit',compact('kelas','guru','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Walikelas  $walikelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Walikelas::findOrFail($id);

        // Validasi data yang dikirim
        $this->validate($request, [
            'idkelas' => 'required',
            'idguru' => 'required',
        ]);

        // Mengupdate data semester
        $data->update([
            'idkelas' => $request->idkelas,
            'idguru' => $request->idguru,
        ]);

        if ($data) {
            return redirect()->route('walikelas.index')->with('success', 'Data Wali Kelas Berhasil Diubah');
        } else {
            return redirect()->route('walikelas.create')->with('error', 'Data Wali Kelas Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Walikelas  $walikelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $walikelas = Walikelas::findOrFail($id);
        $walikelas->delete();
        return response()->json(['success' => 'Data Wali Kelas Berhasil Dihapus']);
    }
}
