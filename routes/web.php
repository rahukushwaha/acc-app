<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\FilePermission\MenuController;
use App\Http\Controllers\FilePermission\PermissionController;
use App\Http\Controllers\Sales\InvoiceController;
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
})->name("Home");


Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'handleLogin'])->name('handleLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['ensure.is.logged.in'])->group(function () {
    //Route::middleware(['make.menus'])->group(function () {
        Route::get('/Dashboard', [DashboardController::class, 'index']);
        Route::get('/Empty', function () { return view('emptypage'); });
        Route::get('/FilePermission/Menu', [MenuController::class, 'index'])->name('getMenuPermissionList');
        Route::get('/FilePermission/Menu/AddUpdate/{id?}', [MenuController::class, 'AddUpdate'])->name('getMenuAddUpdate');
        Route::post('/FilePermission/Menu/AddUpdate/{id?}', [MenuController::class, 'postAddUpdate'])->name('postMenuAddUpdate');
        Route::get('/FilePermission/Menu/Delete/{id?}', [MenuController::class, 'Delete'])->name('getMenuDelete');
        Route::get('/FilePermission/Permission/AddUpdate/{encryptId?}', [PermissionController::class, 'AddUpdate'])->name('getPermissionAddUpdate');
        Route::post('/FilePermission/Permission/AddUpdate/{encryptId?}', [PermissionController::class, 'postAddUpdate'])->name('postPermissionAddUpdate');

        //Sales
        Route::get('/Sales/Invoice/', [InvoiceController::class, 'Index'])->name('getSalesInvoiceIndex');

        Route::get('/sub/menu/link', function () { return view('emptypage'); });
        Route::get('/submeu/link/one', function () { return view('emptypage'); });
        Route::get('/submeu/link/two', function () { return view('emptypage'); });
    //});
});
