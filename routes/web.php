<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//MEMBERS AND ADMIN
Route::prefix('admin')->name('admin.')->middleware(['auth:web', config('jetstream.auth_session'), 'verified', 'role:member|admin'])->group(function () {
    Route::get('settings', function () {
        return view('admin.dashboard');
    })->name('settings');
    Route::post('/permissions/{permission}/roles', [\App\Http\Controllers\Admin\PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [\App\Http\Controllers\Admin\PermissionController::class, 'removeRole'])->name('permissions.roles.revoke');
    route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class)->except('show', 'destroy');
    route::post('roles/{role}/permissions', [\App\Http\Controllers\Admin\RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [\App\Http\Controllers\Admin\RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    route::resource('roles', \App\Http\Controllers\Admin\RoleController::class)->except('show', 'destroy');


    Route::resource('sponsors', \App\Http\Controllers\Admin\SponsorController::class)->except('show', 'destroy');
    Route::get('slides', [\App\Http\Controllers\Admin\SlideController::class, 'index'])->name('slides.index');
    Route::get('slides/create', [\App\Http\Controllers\Admin\SlideController::class, 'create'])->name('slides.create');
    Route::get('slides/{slide}/edit', [\App\Http\Controllers\Admin\SlideController::class, 'edit'])->name('slides.edit');

    Route::post('filepondupload', [\App\Http\Controllers\Admin\FilepondController::class, 'upload'])->name('filepond.upload');
    Route::delete('filepondrevert', [\App\Http\Controllers\Admin\FilepondController::class, 'revert'])->name('filepond.revert');

});
