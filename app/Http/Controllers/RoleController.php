<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use \Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('name')->where('name', '!=', 'admin')->paginate(10);

        return view('roles.index', compact (['roles']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::orderBy('name')->get();

        return view('roles.create', compact (['permissions']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'permissions.*' => 'required|integer|exists:permissions,id',//має бути хоча б 1, також повинно бути в таблиці permissions
        ]);

        $newRole = Role::create([
            'name' => $request->name,

        ]);

        $permissions = Permission::whereIn('id', $request->permissions)->get();

        $newRole->syncPermissions($permissions);

        return redirect()->back()->with('status','Нову роль додано!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('name')->get();
        $role = Role::where('name', '!=', 'admin')->findOrFail($role->id);
        return view('roles.edit', compact (['permissions', 'role']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|max:255',
            'permissions' => 'required',
            'permissions.*' => 'required|integer|exists:permissions,id',//має бути хоча б 1, також повинно бути в таблиці permissions
        ]);
        $role = Role::where('name', '!=', 'admin')->findOrFail($role->id);
        $role->update([
            'name' => $request->name,
        ]);
        $permissions = Permission::whereIn('id', $request->permissions)->get();

        $role->syncPermissions($permissions);

        return redirect()->back()->with('status','Роль успішно змінено!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('status','Роль успішно видалено!');
    }
}
