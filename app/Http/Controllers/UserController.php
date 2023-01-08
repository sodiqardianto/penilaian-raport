<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-user', ['only' => ['create', 'store']]);
        $this->middleware('permission:view-user', ['only' => ['index']]);
        $this->middleware('permission:edit-user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }

    public function data()
    {
        $user = User::all();
        return DataTables::of($user)
            ->addIndexColumn()
            ->addColumn('action', function ($user) {
                if ($user->id == 1) {
                    $delete = '<button data-id="' . $user->id . '" class="btn btn-danger btn-sm delete" hidden><i class="fa fa-trash"></i> Delete</button>';
                } else {
                    $delete = '<button data-id="' . $user->id . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                }
                $edit = '<a href="' . route('users.edit', $user->id) . '" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>';
                return $edit . ' ' . $delete;
            })->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required|min:6|confirmed'
        ));

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


        if ($user) {
            $user->assignRole($request->role);
            return redirect()->route('users.index')->with('success', 'User berhasil dibuat');
        } else {
            return redirect()->route('users.create')->with('error', 'User gagal dibuat');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $role_satuan = $user->roles->first();
        return view('user.edit', compact('user', 'roles', 'role_satuan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, array(
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
        ));

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'status' => $request->status,
        ]);

        if ($user) {
            return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
        } else {
            return redirect()->route('users.index')->with('error', 'User gagal diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['success' => 'User berhasil dihapus']);
    }

    public function changePassword(Request $request, User $user)
    {
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password salah');
        } else {
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:6',
                'conf_new_password' => 'required|same:new_password',
            ]);

            $user->update([
                'password' => Hash::make($request->new_password)
            ]);

            if ($user) {
                return redirect()->route('users.index')->with('success', 'Password berhasil diubah');
            } else {
                return redirect()->route('users.edit', $user->id)->with('error', 'Password gagal diubah');
            }
        }
    }
}
