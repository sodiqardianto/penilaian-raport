<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashborad');
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::get('dataUser', [App\Http\Controllers\UserController::class, 'data'])->name('users.data');

    Route::post('users/{user}/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('users.changePassword');

    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::get('dataRole', [App\Http\Controllers\RoleController::class, 'data'])->name('roles.data');
    Route::get('roles/{role}/access', [App\Http\Controllers\RoleController::class, 'access'])->name('roles.access');
    Route::post('roles/{role}/access', [App\Http\Controllers\RoleController::class, 'updateAccess'])->name('roles.updateAccess');

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::get('dataPermission', [App\Http\Controllers\PermissionController::class, 'data'])->name('permissions.data');
});

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
