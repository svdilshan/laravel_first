<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\permission;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PermissioinController extends Controller
{
   public function index()
   {
    $permissions = permission::all();
    return view('admin.permissions.index', compact('permissions'));
   }

   public function create()
   {
      return view('admin.permissions.create');
   }

   public function store(Request $request)
   {
       $validated=$request->validate(['name'=>['required','min:3']]);
       Permission::create($validated);
       return to_route('admin.permissions.index')->with('message','New Permission Addrd.');;
   }
   public function edit(Permission $permission)
   {
      return View('admin.permissions.edit', compact('permission'));
   }

   public function update(Request $request ,Permission $permission)
   {
      $validated=$request->validate(['name'=>['required','min:3']]);
       $permission->update($validated);
       return to_route('admin.permissions.index')->with('message','The Permission Updated.');
   }

   public function destroy(Permission $permission)
   {
      $permission->delete();
      return to_route('admin.permissions.index')->with('message','The Permission Delete.');
}
}