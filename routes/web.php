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

Route::get('players', [\App\Http\Controllers\MemberController::class, 'index'])->name('members.index');

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

    Route::get('users/trashed', [\App\Http\Controllers\Admin\UserController::class, 'trashed'])->name('users.trashed');
    Route::get('users/trashed/{id}/restore', [\App\Http\Controllers\Admin\UserController::class, 'trashedRestore'])->name('users.trashed.restore');
    Route::get('users/trashed/{id}/forse_delete', [\App\Http\Controllers\Admin\UserController::class, 'trashedDelete'])->name('users.trashed.destroy');

    Route::post('/members/{member}/roles', [\App\Http\Controllers\Admin\MemberController::class, 'assignRole'])->name('members.roles');
    Route::delete('/members/{member}/roles/{role}', [\App\Http\Controllers\Admin\MemberController::class, 'removeRole'])->name('members.roles.revoke');
    Route::post('/members/{member}/permissions', [\App\Http\Controllers\Admin\MemberController::class, 'givePermission'])->name('members.permissions');
    Route::delete('/members/{member}/permissions/{permission}', [\App\Http\Controllers\Admin\MemberController::class, 'revokePermission'])->name('members.permissions.revoke');
    Route::resource('members', \App\Http\Controllers\Admin\MemberController::class)->except('show', 'destroy');

    Route::resource('sponsors', \App\Http\Controllers\Admin\SponsorController::class)->except('show', 'destroy');
    Route::get('slides', [\App\Http\Controllers\Admin\SlideController::class, 'index'])->name('slides.index');
    Route::get('slides/create', [\App\Http\Controllers\Admin\SlideController::class, 'create'])->name('slides.create');
    Route::get('slides/{slide}/edit', [\App\Http\Controllers\Admin\SlideController::class, 'edit'])->name('slides.edit');

    Route::post('filepondupload', [\App\Http\Controllers\Admin\FilepondController::class, 'upload'])->name('filepond.upload');
    Route::delete('filepondrevert', [\App\Http\Controllers\Admin\FilepondController::class, 'revert'])->name('filepond.revert');
    Route::post('memberplayer', [\App\Http\Controllers\admin\Membercontroller::class, 'upload'])->name('member.upload');

});
