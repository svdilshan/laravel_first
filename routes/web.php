<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PermissioinController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PostController;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth','role:admin'])->name('admin.')->prefix('/admin')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::post('/roles/{role}/permissions',[RoleController::class,'assignPermissions'])->name('roles.permissions');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissioinController::class);
    Route::resource('/users', UserController::class);
    
   

});

Route::resource('/posts' ,PostController::class);




require __DIR__.'/auth.php';
