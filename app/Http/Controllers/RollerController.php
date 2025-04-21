<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role as ContractsRole;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RollerController extends Controller
{
    //
    public function index()
    {
        // Fetch all roles and permissions
        $roles = Role::orderBy('name', 'asc')->get();                   
        return view('Roles.list', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::orderBy('name', 'asc')->get();
        return view('Roles.create', compact('permissions'));
    }
    public function store(Request $request)
    {
        // dd("hdguhfuhgiug");
        // Validate and store the roles
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|min:3',
    ]);

        // Redirect or return a response

        if ($validator->passes()){
            // dd($request->permission);
           $role->update(['name' => $request->name]);
           if (!empty($request->permission)) {
                $role->syncPermissions($request->permission);
           }
            return redirect()->route('roles.index')->with('success', 'Role created successfully');
        }
        else{
            return redirect()->back()->withErrors($validator)->withInput();
        }

    }
    public function edit($id)
    {
        // Find the roles by ID and return the edit view
        $role = Role::findOrFail($id);
        $hasPermmissions = $role->permissions->pluck('id')->toArray();
        // dd($hasPermmissions);
        $permissions = Permission::orderBy('name', 'asc')->get();
        return view('Roles.edit', compact('permissions', 'hasPermmissions', 'role'));
    }
 
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
    
        // Validate and update the roles
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,' . $id . '|min:3',
        ]);
    
        // Redirect or return a response
        if ($validator->passes()) {
            // Update the role's name
            $role->name = $request->name;
            $role->update();
    
            // Sync permissions if provided
            if (!empty($request->permission)) {
                $role->syncPermissions($request->permission);
            } else {
                $role->syncPermissions([]); // Clear permissions if none are provided
            }
    
            return redirect()->route('roles.index')->with('success', 'Role updated successfully');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
    public function destroy($id)
    {
        // Find the roles by ID and delete it
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
    }
        // Redirect or return a response
    
}
