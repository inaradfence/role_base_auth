<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DOMDocument;
use DOMXPath;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions=Permission::orderBy('created_at','desc')->paginate(10);
        return view('Permission.list', ['permissions' => $permissions]);
    }
    public function create()
    {
        return view('Permission.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3',
            
        ]);
        if ($validator->passes()) {
            Permission::create(['name' => $request->name]);
            return redirect()->route('permission.index')
                ->with('success', 'Permission created successfully.');
        }  else {
            return redirect()->route('permission.index')
                ->withErrors($validator)
                ->withInput();
        }    
    }

    public function edit($id){
        $permission = Permission::find($id);
        if (!$permission) {
            return redirect()->route('permission.index')->with('error', 'Permission not found.');
        }
        return view('Permission.edit', ['permission' => $permission]);
    }


    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:permissions,name,'.$id.',id'
        ]);
        if ($validator->passes()) {
            $permission = Permission::find($id);
            if (!$permission) {
                return redirect()->route('permission.index')->with('error', 'Permission not found.');
            }
            $permission->name = $request->name;
            $permission->update();
            return redirect()->route('permission.index')
                ->with('success', 'Permission updated successfully.');
        } else {
            return redirect()->route('permission.index')
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        if (!$permission) {
            return redirect()->route('permission.index')->with('error', 'Permission not found.');
        }
        $permission->delete();
        return redirect()->route('permission.index')
            ->with('success', 'Permission deleted successfully.');
    }


}