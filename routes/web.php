<?php

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
