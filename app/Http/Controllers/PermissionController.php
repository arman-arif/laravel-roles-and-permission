<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        Permission::create(['name' => Str::slug($request->name)]);

        toastSuccess('Permission added successfully', 'Success!');

        return redirect()->back();
    }

    public function delete($id)
    {
        $permission = Permission::find($id);
        $permission->delete();

        toastInfo('Permission deleted successfully', 'Success!');

        return redirect()->back();
    }

    public function getRolePermission()
    {
        return view('permissions.to-role');
    }
}
