<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:create-role', ['only' => ['create', 'store']]);
        $this->middleware('permission:view-role', ['only' => ['index']]);
        $this->middleware('permission:edit-role', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-role', ['only' => ['destroy']]);
        $this->middleware('permission:access-role', ['only' => ['access', 'updateAccess']]);
    }

    public function data()
    {
        $roles = Role::all();
        return datatables()->of($roles)
            ->addIndexColumn()
            ->addColumn('action', function ($role) {
                if ($role->id == 1) {
                    $delete = '<button data-id="' . $role->id . '" data-name="' . $role->name . '" class="btn btn-danger btn-sm delete" hidden><i class="fa fa-trash"></i> Delete</button>';
                } else {
                    $delete = '<button data-id="' . $role->id . '" data-name="' . $role->name . '" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>';
                }
                $access = '<a href="' . route('roles.access', $role->id) . '" class="btn btn-primary btn-sm"><i class="fa fa-key"></i> Access</a>';
                $edit = '<a href="' . route('roles.edit', $role->id) . '" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Ubah</a>';
                return $edit . ' ' . $access . ' ' . $delete;
            })
            ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);

        if ($role) {
            return redirect()->route('roles.index')->with('success', 'Role created successfully');
        } else {
            return redirect()->route('roles.index')->with('error', 'Role failed to create');
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
    public function edit(Role $role)
    {
        return view('role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        $role->update([
            'name' => $request->name,
        ]);

        if ($role) {
            return redirect()->route('roles.index')->with('success', 'Role berhasil diperbarui');
        } else {
            return redirect()->route('roles.index')->with('error', 'Role gagal diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json(['success' => 'Role berhasil dihapus']);
    }

    public function access(Role $role)
    {
        $permissions = Permission::get()->chunk(4);
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        return view('role.access', compact('rolePermissions', 'permissions', 'role'));
    }

    public function updateAccess(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index')->with('success', 'Role berhasil diperbarui');
    }
}
