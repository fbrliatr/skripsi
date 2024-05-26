<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemRequestController;

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

Route::get('/' , [\App\Http\Controllers\HomeController::class , 'index']);

Route::get('/landing', function () {
    return view('landing-page/index');
});



Auth::routes();

Route::get('forget-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

// Route::get('/banding' , [\App\Http\Controllers\HomeController::class , 'banding' ])->name('banding');
// Route::get('/bandingKota' , [\App\Http\Controllers\HomeController::class , 'banding' ])->name('banding.kota');
// Route::get('/bandingDivisi' , [\App\Http\Controllers\HomeController::class , 'banding' ])->name('banding.divisi');
// Route::get('/bandingProvinsi' , [\App\Http\Controllers\HomeController::class , 'banding' ])->name('banding.provinsi');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/storeItemRequest/' , [\App\Http\Controllers\ItemRequestController::class , 'storeItemRequest'])->name('storeItemRequest');
// Route::post('/storeItemNonRequest/' , [\App\Http\Controllers\NonItemRequestController::class , 'storeRequest'])->name('storeRequest');
Route::post('/formBukti/' , [\App\Http\Controllers\ItemRequestController::class , 'formBukti'])->name('formBukti');

Route::post('/updateProfile' , [\App\Http\Controllers\HomeController::class , 'updateProfile'])->name('updateProfile');


Route::prefix('admin')->middleware('auth')->group(function (){

    Route::middleware('role')->group(function () {
        Route::get('/dashboard/main', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
//    Route::get('/pemetaan/provinsi' , [\App\Http\Controllers\AdminController::class)->name('admin.provinsiIndex');
        // Route::get('/pemetaan/wargaProvinsi', [\App\Http\Controllers\AdminController::class, 'wargaProvinsiIndex'])->name('admin.wargaProvinsi');
        // Route::post('/pemetaan/wargaProvinsi', [\App\Http\Controllers\AdminController::class, 'storeProvinsi'])->name('admin.storeProvinsi');
        // Route::put('/pemetaan/wargaProvinsi/{id}', [\App\Http\Controllers\AdminController::class, 'updateProvinsi'])->name('admin.updateProvinsi');
        // Route::get('/pemetaan/deleteProvinsi/{id}', [\App\Http\Controllers\AdminController::class, 'deleteProvinsi'])->name('admin.deleteProvinsi');

        //pemetaan warga kota
        // Route::get('/pemetaan/wargaKota', [\App\Http\Controllers\AdminController::class, 'wargaKotaIndex'])->name('admin.wargaKota');
        // Route::post('/pemetaan/wargaKota/', [\App\Http\Controllers\AdminController::class, 'storeKota'])->name('admin.storeKota');
        // Route::get('/pemetaan/deleteKota/{id}', [\App\Http\Controllers\AdminController::class, 'deleteKota'])->name('admin.deleteKota');
        // Route::put('/pemetaan/wargaKota/{id}', [\App\Http\Controllers\AdminController::class, 'updateKota'])->name('admin.updateKota');

        //pemetaan warga divisi

        Route::get('/pemetaan/wargaDivisi', [\App\Http\Controllers\AdminController::class, 'wargaDivisiIndex'])->name('admin.wargaDivisi');
        Route::post('/pemetaan/wargaDivisi/', [\App\Http\Controllers\AdminController::class, 'storeDivisi'])->name('admin.storeDivisi');
        Route::put('/pemetaan/wargaDivisi/{id}', [\App\Http\Controllers\AdminController::class, 'updateDivisi'])->name('admin.updateDivisi');
        Route::get('/pemetaan/deleteDivisi/{id}', [\App\Http\Controllers\AdminController::class, 'deleteDivisi'])->name('admin.deleteDivisi');

        //kategori barang

        Route::get('/category/', [\App\Http\Controllers\ItemCategoryController::class, 'index'])->name('admin.itemIndex');
        Route::post('/category/', [\App\Http\Controllers\ItemCategoryController::class, 'storeItem'])->name('admin.storeItem');
        Route::put('/category/{id}', [\App\Http\Controllers\ItemCategoryController::class, 'updateItem'])->name('admin.updateItem');
        Route::get('/deleteCategory/{id}', [\App\Http\Controllers\ItemCategoryController::class, 'deleteItem'])->name('admin.deleteItem');

        //ItemStock

        Route::get('/itemStock', [\App\Http\Controllers\ItemStockController::class, 'index'])->name('admin.itemStockIndex');
        Route::post('/itemStock', [\App\Http\Controllers\ItemStockController::class, 'storeItemStock'])->name('admin.storeItemStock');
        Route::put('/update/itemStock/{id}', [\App\Http\Controllers\ItemStockController::class, 'updateItemStock'])->name('admin.updateItemStock');
        Route::get('/delete/itemStock/{id}', [\App\Http\Controllers\ItemStockController::class, 'deleteItemStock'])->name('admin.deleteItemStock');
        Route::get('/cetakStockItem/{tglAwal}/{tglAkhir}'  , [\App\Http\Controllers\ItemStockController::class , 'cetakStock'])->name('admin.cetakStockItem');

        //marketmaping

        // Route::get('/marketMaping', [\App\Http\Controllers\MarketMapingController::class, 'index'])->name('admin.marketMapingIndex');
        // Route::post('/marketMaping', [\App\Http\Controllers\MarketMapingController::class, 'storeMarket'])->name('admin.storeMarketMaping');
        // Route::put('/marketMaping/{id}', [\App\Http\Controllers\MarketMapingController::class, 'updateMarket'])->name('admin.updateMarketMaping');
        // Route::get('/delete/marketMaping/{id}', [\App\Http\Controllers\MarketMapingController::class, 'deleteMarket'])->name('admin.deleteMarketMaping');

        //agri

        // Route::get('/agriMaping', [\App\Http\Controllers\agriController::class, 'index'])->name('admin.agriIndex');
        // Route::post('/agriMaping', [\App\Http\Controllers\agriController::class, 'storeAgri'])->name('admin.storeAgri');
        // Route::put('/agriMaping/{id}', [\App\Http\Controllers\agriController::class, 'updateAgri'])->name('admin.updateAgri');
        // Route::get('/delete/agriMaping/{id}', [\App\Http\Controllers\agriController::class, 'deleteAgri'])->name('admin.deleteAgri');

        //requestItem

        Route::get('/requestItem'  , [\App\Http\Controllers\ItemRequestController::class , 'index'])->name('admin.itemReqIndex');
        Route::get('/acceptRequestItem/{id}' , [\App\Http\Controllers\ItemRequestController::class , 'acceptRequest'])->name('admin.acceptRequestItem');
        Route::get('/waitingItem/{id}' , [\App\Http\Controllers\ItemRequestController::class , 'waiting'])->name('admin.waitingItem');
        Route::get('/onProgressItem/{id}' , [\App\Http\Controllers\ItemRequestController::class , 'runProgress'])->name('admin.runProgressItem');
        Route::get('/rejectRequestItem/{id}' , [\App\Http\Controllers\ItemRequestController::class , 'rejectedRequest'])->name('admin.rejectRequestItem');
        Route::get('/doneProgressItem/{id}' , [\App\Http\Controllers\ItemRequestController::class , 'doneRequest'])->name('admin.doneProgressItem');
        // Route::get('/cetakRequestItem'  , [\App\Http\Controllers\ItemRequestController::class , 'cetakData'])->name('admin.cetakDataItem');
        Route::get('/cetakRequestItem', [ItemRequestController::class, 'cetakRequestItem'])->name('admin.cetakRequestItem');
    
        Route::get('/downloadItemSupportedDocument/{id}' , [\App\Http\Controllers\ItemRequestController::class , 'downloadFileItem'])->name('admin.downloadDocItem');
        // Route::get('/cetak/pdf/', [\App\Http\Controllers\DataCetakController::class, 'index'])->name('admin.dataCetak');

        //Images
        Route::get('/getFormBukti/{id}'  , [\App\Http\Controllers\ItemRequestController::class , 'formBukti'])->name('admin.formBukti');


        //NonrequestItem

        Route::get('/nonrequestItem'  , [\App\Http\Controllers\NonItemRequestController::class , 'index'])->name('admin.NonItemRequestIndex');
        Route::get('/acceptNonRequestItem/{id}' , [\App\Http\Controllers\NonItemRequestController::class , 'acceptRequest'])->name('admin.acceptRequestNonItem');
        Route::get('/onProgressNonItem/{id}' , [\App\Http\Controllers\NonItemRequestController::class , 'runProgress'])->name('admin.runProgressNonItem');
        Route::get('/rejectRequestNonItem/{id}' , [\App\Http\Controllers\NonItemRequestController::class , 'rejectedRequest'])->name('admin.rejectRequestNonItem');
        Route::get('/doneProgressNonItem/{id}' , [\App\Http\Controllers\NonItemRequestController::class , 'doneRequest'])->name('admin.doneProgressNonItem');
        // Route::get('/downloadNonItemSupportedDocument/{id}' , [\App\Http\Controllers\NonItemRequestController::class , 'downloadFile'] )->name('admin.downloadDocNonItem');
        // Route::get('/downloadItemSupportedDocument/{id}' , [\App\Http\Controllers\NonItemRequestController::class , 'downloadFile'] )->name('admin.downloadDocItem');


        //visualisasi

        // Route::get('/visualisasi/wilayah' , [\App\Http\Controllers\WilayahController::class , 'wilayah'])->name('visualisasi.wilayah.index');
        // Route::get('/visualisasi/divisi/search' , [\App\Http\Controllers\WilayahController::class , 'divisi'])->name('visualisasi.search.divisi');
        // Route::get('/visualisasi/kota/search' , [\App\Http\Controllers\WilayahController::class , 'kota'])->name('visualisasi.search.kota');
        // Route::get('/visualisasi/provinsi/search' , [\App\Http\Controllers\WilayahController::class , 'provinsi'])->name('visualisasi.search.provinsi');

        // Route::get('/visualisasi/provinsi/banding' , [\App\Http\Controllers\WilayahController::class , 'bandingProvinsi'])->name('visualisasi.banding.provinsi');

        // Route::get('/visualisasi/divisi/banding' , [\App\Http\Controllers\WilayahController::class , 'bandingDivisi'])->name('visualisasi.banding.divisi');
        // Route::get('/visualisasi/kota/banding' , [\App\Http\Controllers\WilayahController::class , 'bandingKota'])->name('visualisasi.banding.kota');
        // Route::get('/visualisasi/banding' , [\App\Http\Controllers\WilayahController::class , 'banding'])->name('visualisasi.wilayah.banding');
    });
});
