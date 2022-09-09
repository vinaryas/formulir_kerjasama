<?php

use App\Http\Controllers\Rbac\PermissionController;
use App\Http\Controllers\Rbac\PermissionRoleController;
use App\Http\Controllers\Rbac\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('user/dt', [UserController::class, 'dt'])->name('user.dt');
Route::group(['middleware' => []], function () {
    Route::resource('user', UserController::class);
	Route::get('user/{id}/edit_password', [UserController::class, 'editPassword'])->name('edit.password');
	Route::put('user/{id}/update_password', [UserController::class, 'updatePassword'])->name('update.password');
});

Route::controller(PermissionController::class)->name('permission.')->group(function(){
    Route::get('permission', 'index')->name('permission.index');
    Route::post('permission', 'store')->name('permission.store');
    Route::get('permission/dt', 'dt')->name('permission.dt');
});

/* Role */
Route::get('role/select2', [RoleController::class, 'select2'])->name('role.select2');
Route::group(['middleware' => []], function () {
    Route::controller(RoleController::class)->name('role.')->group(function(){
        Route::get('role', 'index')->name('index');
        Route::get('role/dt', 'dt')->name('dt');
        Route::post('role', 'store')->name('store');
        Route::get('role/{role}/edit', 'edit')->name('edit');
        Route::put('role/{role}', 'update')->name('update');
    });

    Route::controller(PermissionRoleController::class)->name('permission_role.')->group(function(){
        Route::get('permission_role/dt/{role}', 'dt')->name('dt');
        Route::post('permission_role', 'update')->name('update');
        Route::get('permission_role/list/{role}', 'list')->name('list');
    });
});

Route::group(['prefix' => 'form'], function(){
    Route::get('/form', [FormController::class, 'index'])->name('form.index');
//  Route::get('/form/detail/{id}', [formController::class, 'detail'])->name('form.detail');
    Route::get('/form/create/', [formController::class, 'create'])->name('form.create');
    Route::post('/form/store', [formController::class, 'store'])->name('form.store');
});


Route::group(['prefix' => 'approval'], function(){
    Route::get('/approval', [ApprovalController::class, 'index'])->name('approval.index');
    Route::get('/approval/detail/{id}', [ApprovalController::class, 'detail'])->name('approval.detail');
    Route::post('/approval/store', [ApprovalController::class, 'store'])->name('approval.store');
});