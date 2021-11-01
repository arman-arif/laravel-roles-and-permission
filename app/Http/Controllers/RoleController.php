<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        Role::create($request->except(['_token', '_method']));

        toastSuccess('Role added successfully', 'Success!');

        return redirect()->back();
    }

    public function delete($id)
    {
        $role = Role::find($id);
        $role->delete();

        toastInfo('Role deleted successfully', 'Success!');

        return redirect()->back();
    }
}
