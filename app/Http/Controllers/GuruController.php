<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-guru', ['only' => ['create', 'store']]);
        $this->middleware('permission:view-guru', ['only' => ['index']]);
        $this->middleware('permission:edit-guru', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-guru', ['only' => ['destroy']]);
    }

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
            ->addColumn('username', function ($guru) {
                if ($guru->iduser != null) {
                    return $guru->user->username;
                } else {
                    return '';
                }
            })
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
        $user = User::where('username', 'like', '%guru%')->get();
        return view('guru.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $guru = Guru::where('namaguru', $request->namaguru)->where('iduser', $request->iduser)->count();
        if ($guru > 0) {
            return redirect()->route('guru.create')->with('error', 'Data Guru Gagal Ditambahkan / Id Guru Sudah ada');
        }
        // Validasi data yang dikirim
        $this->validate($request, [
            'namaguru' => 'required',
            'notelp' => 'required',
        ]);

        // Membuat record baru di table guru
        $data = Guru::create([
            'namaguru' => $request->namaguru,
            'notelp' => $request->notelp,
            'iduser' => intval($request->iduser),
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
        $user = User::all();
        return view('guru.edit', compact('guru', 'user'));
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
        $datacheck = Guru::where('namaguru', $request->namaguru)->where('iduser', $request->iduser)->count();
        if ($datacheck > 0) {
            return redirect()->route('guru.edit', $guru->id)->with('error', 'Data Guru Gagal Ditambahkan / Id Guru Sudah ada');
        }
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
            'iduser' => intval($request->iduser),
        ]);

        if ($data) {
            return redirect()->route('guru.index')->with('success', 'Data Guru Berhasil Diubah');
        } else {
            return redirect()->route('guru.edit', $guru->id)->with('error', 'Data Guru Gagal Diubah');
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
