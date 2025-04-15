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
        return view('Permission.list');
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
   
    public function edit()
    {
        // return view('Permission.create');
    }





}