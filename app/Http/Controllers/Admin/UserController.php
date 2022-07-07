<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Unique;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all()->except(Auth::id());
        return view('admin.users.index', compact('users'));
    }
    public function edit(User $user)
    {
        $roles=Role::all();
        return view('admin.users.edit', compact('user' , 'roles'));
    }
    public function update(UserUpdateRequest $request, User $user)
    {
      $user->update($request->validate());
     return to_route('admin.users.index')->with('message', 'User Updated.');}

public function destroy(User $user)
{
   $user->delete();
   return to_route('admin.users.index');
}

/*public function update(Request $request)
{
    $data=User::find($request->id);
    $data->name=$request->name;
    $data->eamil=$request->eamil->unique('users');
    $data->role_id=$request->role_id;
    $data->save();
    return to_route('admin.users.index')->with('message', 'User Updated.');
    

}*/

}


#public function update(UserUpdateRequest $request, User $user)
#{
 #  $user->update($request->validate() , );
# return to_route('admin.users.index')->with('message', 'User Updated.');}


