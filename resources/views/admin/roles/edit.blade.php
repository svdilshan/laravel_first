<x-admin-layout>
    <div class="mt-12 max-w-6xl mx-auto bg-slate-50 p-4 rounded">
        <div class="flex m-2 p-2">
            <a href="{{route('admin.roles.index')}}" class=" px-4 py-3 bg-indigo-300 hover:bg-indigo-600 rounded">
            Back</a>
        </div>
        <div class="max-w-md mx-auto bg-gray-100 p-6 mt-12 rounded">
            <form class=" space-y-5" method="post" action="{{route('admin.roles.update', $role->id)}}">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class=" text-xl">Name</label>
                    <input id="name " type="text" name="name" value=" {{$role->name}}" class=" block w-full py-3 mt-2 text-gray-800 
                    appearance-none border-2 border-gray-100 focus:text-gray-500 focus:outline-none focus:border-gray-200 rounded-md">
                    @error('name')
                    <span class="text-sm text-red-400  ">{{$message}}</span>
                        
                    @enderror
                    
                    
                    
                    </div>
                    <button type="submit" class="w-full py-3 mt-10 bg-indigo-400 hover:bg-indigo-600
                    font-medium text-white uppercase
                    focus:outline-none hover:shadow-none"> Update </button>
                </div>
          
          
          
          
          
          
          
          
          
            </form>
            
          </div>

          <!-- new sec-->
          <div class="mt-12 max-w-6xl mx-auto bg-slate-50 p-4 rounded">
            <div class="flex m-2 p-2">
                <h2>Permission</h2>
                <div class="max-w-md mx-auto">
                    @foreach ($role->permissions as $pr )
                        <span class="m-2 p-2 bg-indigo-300 rounded-md">{{$pr->name}}</span>
                    @endforeach
                </div>
            </div>
            <div class="max-w-md mx-auto bg-gray-100 p-6 mt-12 rounded">
                <form class=" space-y-5" method="post" action="{{route('admin.roles.permissions', $role->id)}}">
                    @csrf
                   
                    <div>
                        <label for="text-xl" style=" max-width:300px">
                            <span  class=" text-gray-700">Permissions</span>
                            <select name="permissions[]" class=" block w-full py-3 mt-2
                            text-gray-800           appearance-none border-2 border-gray-100 focus:text-gray-500 
                            focus:outline-none focus:border-gray-200 rounded-md " multiple>
                                @foreach ($permissions as $permission)
                                  <option value="{{$permission->id}}"
                                     @selected($role->hasPermission($permission->name))>{{$permission->name}}</option>

                                    
                                @endforeach
                            </select>
                       </label>
                       
                                     
                        
                        
                        </div>
                        <button type="submit" class="w-full py-3 mt-10 bg-indigo-400 hover:bg-indigo-600
                        font-medium text-white uppercase
                        focus:outline-none hover:shadow-none"> ASSIGN PERMISSION </button>
                    </div>
              
              
              
              
              
              
              
              
              
                </form>
                
              </div>
    
    
    
    
    
    
    </div>
    
    </x-admin-layout>