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

    Route::get('/eksport', function () {
        return view('eksport');
    })->name('eksport');

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

    Route::resource('murid', App\Http\Controllers\MuridController::class);
    Route::get('datamurid', [App\Http\Controllers\MuridController::class, 'data'])->name('murid.data');

    Route::resource('guru', App\Http\Controllers\GuruController::class);
    Route::get('dataguru', [App\Http\Controllers\GuruController::class, 'data'])->name('guru.data');

    Route::resource('pelajaran', App\Http\Controllers\PelajaranController::class);
    Route::get('datapelajaran', [App\Http\Controllers\PelajaranController::class, 'data'])->name('pelajaran.data');

    Route::resource('semester', App\Http\Controllers\SemesterController::class);
    Route::get('datasemester', [App\Http\Controllers\SemesterController::class, 'data'])->name('semester.data');

    Route::resource('kelas', App\Http\Controllers\KelasController::class);
    Route::get('datakelas', [App\Http\Controllers\KelasController::class, 'data'])->name('kelas.data');

    Route::resource('kategori', App\Http\Controllers\KategoriController::class);
    Route::get('datakategori', [App\Http\Controllers\KategoriController::class, 'data'])->name('kategori.data');

    Route::resource('walikelas', App\Http\Controllers\WalikelasController::class);
    Route::get('datawalikelas', [App\Http\Controllers\WalikelasController::class, 'data'])->name('walikelas.data');

    Route::resource('kelasmurid', App\Http\Controllers\KelasmuridController::class);
    Route::get('datakelasmurid', [App\Http\Controllers\KelasmuridController::class, 'data'])->name('kelasmurid.data');

    Route::resource('gurupelajaran', App\Http\Controllers\GurupelajaranController::class);
    Route::get('datagurupelajaran', [App\Http\Controllers\GurupelajaranController::class, 'data'])->name('gurupelajaran.data');

    Route::resource('kelaspelajaran', App\Http\Controllers\KelaspelajaranController::class);
    Route::get('datakelaspelajaran', [App\Http\Controllers\KelaspelajaranController::class, 'data'])->name('kelaspelajaran.data');

    Route::resource('raport', App\Http\Controllers\RaportController::class);
    Route::get('dataraport/{id}', [App\Http\Controllers\RaportController::class, 'data'])->name('raport.data');
    Route::get('raport/{idkelas}/kelasraport', [App\Http\Controllers\RaportController::class, 'kelasreport'])->name('raport.kelas');
    Route::get('datareportkelas', [App\Http\Controllers\RaportController::class, 'datakelas'])->name('raport.datakelas');

    Route::resource('absen', App\Http\Controllers\AbsenController::class);
    Route::get('dataabsen', [App\Http\Controllers\AbsenController::class, 'data'])->name('absen.data');

    Route::resource('sikap', App\Http\Controllers\SikapController::class);
    Route::get('datasikap', [App\Http\Controllers\SikapController::class, 'data'])->name('sikap.data');

    Route::resource('ekstrakulikuler', App\Http\Controllers\EkstrakulikulerController::class);
    Route::get('dataekstrakulikuler', [App\Http\Controllers\EkstrakulikulerController::class, 'data'])->name('ekstrakulikuler.data');

    Route::resource('laporan', App\Http\Controllers\LaporanController::class);
    Route::get('datalaporan', [App\Http\Controllers\LaporanController::class, 'data'])->name('laporan.data');
    Route::get('datalaporanmurid/{id}', [App\Http\Controllers\LaporanController::class, 'datamurid'])->name('laporan.datamurid');
    Route::get('export/{id}/{semester}', [App\Http\Controllers\LaporanController::class, 'export'])->name('laporan.export');
}); 

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
