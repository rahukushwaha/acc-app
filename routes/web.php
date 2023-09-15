<?php

use App\Http\Controllers\API\AjaxController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FilePermission\MenuController;
use App\Http\Controllers\FilePermission\PermissionController;
use App\Http\Controllers\Master\SubItemController;
use App\Http\Controllers\Party\PartyController;
use App\Http\Controllers\Purchases\PurchaseInvoiceController;
use App\Http\Controllers\Sales\SalesInvoiceController;
use App\Http\Controllers\Supplier\SupplierController;
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
    return view('index');
})->name("Home");

Route::get('/File/Read/{filePath}', [FileController::class, 'readFile']);
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

        Route::get('/sub/menu/link', function () { return view('emptypage'); });
        Route::get('/submeu/link/one', function () { return view('emptypage'); });
        Route::get('/submeu/link/two', function () { return view('emptypage'); });

        //Sales
        Route::get('/Sales/Invoice/', [SalesInvoiceController::class, 'Index'])->name('getSalesInvoiceIndex');
        Route::post('/Sales/Invoice/Submit', [SalesInvoiceController::class, 'PostSubmit'])->name('PostSalesInvoiceSubmit');
        //Party for Sales Invoice
        Route::post('/Party/Party/PostAdd', [PartyController::class, 'PostAdd'])->name("Party.Party.PostAdd");
        Route::get('/Party/Party/GetPartDtlWithNameNo', [PartyController::class, 'GetPartDtlWithNameNo'])->name("Party.Party.GetPartDtlWithNameNo");
        Route::post('/Party/Party/getPartyDtlForInvoiceById', [PartyController::class, 'getPartyDtlForInvoiceById'])->name("Party.Party.getPartyDtlForInvoiceById");
        //Purchases
        Route::get('/Purchases/Invoice/', [PurchaseInvoiceController::class, 'Index'])->name('getPurchasesInvoiceIndex');
        Route::post('/Purchases/Invoice/Submit', [PurchaseInvoiceController::class, 'PostSubmit'])->name('PostPurchasesInvoiceSubmit');
        Route::get('/Purchases/Invoice/GetInvoiceDtlById/{intPurchasesId}', [PurchaseInvoiceController::class, 'GetInvoiceDtlById'])->name('PostPurchasesInvoiceGetInvoiceDtlById');
        //Supplier for Purchase Invoice
        Route::post('/Supplier/Supplier/PostAdd', [SupplierController::class, 'PostAdd'])->name("Supplier.Supplier.PostAdd");
        Route::get('/Supplier/Supplier/GetSupplierDtlWithNameNo', [SupplierController::class, 'GetSupplierDtlWithNameNo'])->name("Supplier.Supplier.GetSupplierDtlWithNameNo");
        Route::post('/Supplier/Supplier/getSupplierDtlForInvoiceById', [SupplierController::class, 'getSupplierDtlForInvoiceById'])->name("Supplier.Supplier.getSupplierDtlForInvoiceById");

        // Master
        Route::post('/Master/SubItem/getSubItemByItemId', [SubItemController::class, 'getSubItemByItemId'])->name("Master.SubItem.getSubItemByItemId");
        
    //});
});



//Route::get('/ajax/getPartDtl', [AjaxController::class, 'showDistrictName'])->name("ajax.getPartyDtl");
