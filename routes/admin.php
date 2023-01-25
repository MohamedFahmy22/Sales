<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminPanelSettingController;
use App\Http\Controllers\Admin\TreasurieController;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/
/*
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'guest:admin'], function () {
    Route::get('show/login', [LoginController::class, 'show_login_view'])->name('show.login');
    Route::post('submit/login', [LoginController::class, 'login'])->name('submit.login');
});


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('show.dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});


 */

define('PAGINATE_COUNT', 5);


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'guest:admin'], function () {
    Route::get('login', [LoginController::class, 'show_login_view'])->name('admin.showlogin');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('panelSetting/index', [AdminPanelSettingController::class, 'index'])->name('admin.panelSetting.index');
    Route::get('panelSetting/edit', [AdminPanelSettingController::class, 'edit'])->name('admin.panelSetting.edit');
    Route::post('panelSetting/update', [AdminPanelSettingController::class, 'update'])->name('admin.panelSetting.update');

    /* Start treasuries */

    Route::get('treasuries/index', [TreasurieController::class, 'index'])->name('admin.treasuries.index');
    Route::get('treasuries/create', [TreasurieController::class, 'create'])->name('admin.treasuries.create');
    Route::post('treasuries/store', [TreasurieController::class, 'store'])->name('admin.treasuries.store');
    Route::get('treasuries/edit/{id}', [TreasurieController::class, 'edit'])->name('admin.treasuries.edit');
    Route::post('treasuries/update/{id}', [TreasurieController::class, 'update'])->name('admin.treasuries.update');


    /* End treasuries  */

});
