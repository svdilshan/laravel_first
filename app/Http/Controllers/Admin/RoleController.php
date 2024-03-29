<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
     $roles=Role::whereNotIn('name',['admin'])->orderBy('id')->get(); 
     return view('admin.roles.index', compact('roles')) ;
    }

    public function create()
    {
       return view('admin.roles.create');
    }
    public function store(Request $request)
    {
        $validated=$request->validate(['name'=>['required','min:3']]);
        Role::create($validated);
        return to_route('admin.roles.index')->with('message','New Role Addrd.');
    }

    public function edit(Role $role)
   {
      $permissions= permission::all();
      return View('admin.roles.edit', compact('role', 'permissions'));
   }

   public function update(Request $request ,Role $role)
   {
      $validated=$request->validate(['name'=>['required','min:3']]);
       $role->update($validated);
       return to_route('admin.roles.index')->with('message','The Role Updated.');;
   }
   public function destroy(Role $role)
   {
      $role->delete();
      return to_route('admin.roles.index')->with('message','The Role Delete.');
}
public function assignPermissions(Request $request ,Role $role)
{
   $role->permissions()->sync($request->permissions);
   return back()->with('message','Permissions Add.');
}
}
