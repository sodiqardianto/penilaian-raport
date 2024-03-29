<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SemesterController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:create-semester', ['only' => ['create', 'store']]);
        $this->middleware('permission:view-semester', ['only' => ['index']]);
        $this->middleware('permission:edit-semester', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-semester', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $semester = Semester::all();
        return DataTables::of($semester)
            ->addIndexColumn()
            ->addColumn('action', function ($semester) {
                if ($semester->id == 1) {
                    $delete = '<button data-id="' . $semester->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                } else {
                    $delete = '<button data-id="' . $semester->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                }
                $edit = '<a href="' . route('semester.edit', $semester->id) . '" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>';
                return $edit . ' ' . $delete;
            })
            ->addColumn('semesterstr', function ($semester) {
                if ($semester->semester == '1') {
                    $data = 'Ganjil';
                } else {
                    $data = 'Genap';
                }
                return $data;
            })
            ->make(true);
    }


    public function index()
    {
        return view('semester.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('semester.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // CEK VALIDASI APAKAH DATA SEMESTER DAN TAHUN SUDAH ADA
        $cek = Semester::where('semester', $request->semester)->where('tahun', $request->tahun)->first();

        $gage = $request->semester = 1 ? 'Ganjil' : 'Genap';

        if ($cek) {
            return redirect()->route('semester.create')->with('error', 'Data semester ' . $gage . ' dan tahun ' . $request->tahun . ' sudah ada');
        }

        $this->validate($request, [
            'semester' => 'required',
            'tahun' => 'required',
        ]);

        $data = Semester::create([
            'semester' => $request->semester,
            'tahun' => $request->tahun,
        ]);

        if ($data) {
            return redirect()->route('semester.index')->with('success', 'Data Semester Berhasil Ditambahkan');
        } else {
            return redirect()->route('semester.create')->with('error', 'Data Semester Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit(Semester $semester)
    {
        return view('semester.edit', compact('semester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semester $semester)
    {
        $data = Semester::findOrFail($semester->id);

        // Validasi data yang dikirim
        $this->validate($request, [
            'semester' => 'required',
            'tahun' => 'required',
        ]);

        // Mengupdate data semester
        $data->update([
            'semester' => $request->semester,
            'tahun' => $request->tahun,
        ]);

        if ($data) {
            return redirect()->route('semester.index')->with('success', 'Data Semester Berhasil Diubah');
        } else {
            return redirect()->route('semester.create')->with('error', 'Data Semester Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semester $semester)
    {
        $semester->delete();
        return response()->json(['success' => 'Data Semester Berhasil Dihapus']);
    }
}
