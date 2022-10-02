<?php

use App\Http\Controllers\Rbac\PermissionController;
use App\Http\Controllers\Rbac\PermissionRoleController;
use App\Http\Controllers\Rbac\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PersetujuanWdController;
use App\Http\Controllers\ReviewController;
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

Route::middleware(['auth', 'set.locale'])->group(function () {
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	Route::get('{id}/edit_profile', [UserController::class, 'editProfile'])->name('edit.profile2');
	Route::put('{id}/update_profile', [UserController::class, 'updateProfile'])->name('update.profile2');
	Route::get('user/dt', [UserController::class, 'dt'])->name('user.dt');
	Route::group(['middleware' => ['permission:user']], function () {
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

	Route::group(['prefix' => 'master'], function(){
		Route::get('/jenis_kerjasama', [App\Http\Controllers\JenisKerjasamaController::class, 'index'])->name('jenisKerjasama.index');
		Route::post('/jenis_kerjasama', [App\Http\Controllers\JenisKerjasamaController::class, 'store'])->name('jenisKerjasama.store');
		Route::get('/jenis_kerjasama/detail/{id}', [App\Http\Controllers\JenisKerjasamaController::class, 'detail'])->name('jenisKerjasama.detail');
		Route::post('/jenis_kerjasama/update', [App\Http\Controllers\JenisKerjasamaController::class, 'update'])->name('jenisKerjasama.update');

		Route::get('/jenis_pengajuan', [App\Http\Controllers\JenisPengajuanController::class, 'index'])->name('jenisPengajuan.index');
		Route::post('/jenis_pengajuan', [App\Http\Controllers\JenisPengajuanController::class, 'store'])->name('jenisPengajuan.store');
		Route::get('/jenis_pengajuan/detail/{id}', [App\Http\Controllers\JenisPengajuanController::class, 'detail'])->name('jenisPengajuan.detail');
		Route::post('/jenis_pengajuan/update', [App\Http\Controllers\JenisPengajuanController::class, 'update'])->name('jenisPengajuan.update');

		Route::get('/kategori_mitra', [App\Http\Controllers\KategoriMitraController::class, 'index'])->name('kategoriMitra.index');
		Route::post('/kategori_mitra', [App\Http\Controllers\KategoriMitraController::class, 'store'])->name('kategoriMitra.store');
		Route::get('/kategori_mitra/detail/{id}', [App\Http\Controllers\KategoriMitraController::class, 'detail'])->name('kategoriMitra.detail');
		Route::post('/kategori_mitra/update', [App\Http\Controllers\KategoriMitraController::class, 'update'])->name('kategoriMitra.update');

		Route::get('/rencana_formalisasi', [App\Http\Controllers\RencanaFormalisasiController::class, 'index'])->name('rencanaFormalisasi.index');
		Route::post('/rencana_formalisasi', [App\Http\Controllers\RencanaFormalisasiController::class, 'store'])->name('rencanaFormalisasi.store');
		Route::get('/rencana_formalisasi/detail/{id}', [App\Http\Controllers\RencanaFormalisasiController::class, 'detail'])->name('rencanaFormalisasi.detail');
		Route::post('/rencana_formalisasi/update', [App\Http\Controllers\RencanaFormalisasiController::class, 'update'])->name('rencanaFormalisasi.update');
	});

	Route::group(['prefix' => 'form'], function(){
		Route::get('', [FormController::class, 'index'])->name('form.index');
	//  Route::get('//detail/{id}', [formController::class, 'detail'])->name('form.detail');
		Route::get('/create', [formController::class, 'create'])->name('form.create');
		Route::post('/store', [formController::class, 'store'])->name('form.store');
	});


	Route::group(['prefix' => 'approval'], function(){
		Route::get('', [ApprovalController::class, 'index'])->name('approval.index');
		Route::get('/detail/{id}', [ApprovalController::class, 'detail'])->name('approval.detail');
		Route::post('/store', [ApprovalController::class, 'store'])->name('approval.store');
	});

	Route::controller(DisposisiController::class)->name('disposisition.')->middleware(['permission:disposisi'])->group(function(){
		Route::get('disposisi', 'index')->name('index');
		Route::get('disposisi/detail/{id}', 'detail')->name('detail');
		Route::post('disposisi/{id}', 'disposition')->name('disposition');
	});

	Route::controller(PersetujuanWdController::class)->name('persetujuan.')->middleware(['permission:persetujuan'])->group(function(){
		Route::get('persetujuan', 'index')->name('index');
		Route::get('persetujuan/detail/{id}', 'detail')->name('detail');
		Route::post('persetujuan/{id}', 'persetujuan')->name('persetujuan');
		Route::post('persetujuan/{id}/tolak', 'reject')->name('tolak');
	});

	Route::controller(ReviewController::class)->name('review.')->middleware(['permission:review'])->group(function(){
		Route::get('review', 'index')->name('index');
		Route::get('review/detail/{id}', 'detail')->name('detail');
		Route::post('review/{id}', 'review')->name('review');
	});
});

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('susilaandika@gmail.com')->send(new \App\Mail\NotificationMail($details));
   
    dd("Email is Sent.");
});
