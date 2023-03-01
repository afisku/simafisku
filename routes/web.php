<?php

use App\Http\Controllers\Commodities\Ajax\CommodityAjaxController;
use App\Http\Controllers\Commodities\CommodityController;
use App\Http\Controllers\Commodities\CommodityExportImportController;
use App\Http\Controllers\Commodities\PdfController;
use App\Http\Controllers\CommodityLocations\Ajax\CommodityLocationAjaxController;
use App\Http\Controllers\CommodityLocations\CommodityLocationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SchoolOperationalAssistances\Ajax\SchoolOperationalAssistanceAjaxController;
use App\Http\Controllers\SchoolOperationalAssistances\SchoolOperationalAssistance;
use App\Http\Controllers\SettingController;
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
    return view('auth.login');
});

Route::group(['prefix' => 'auth'], function () {
    Auth::routes();
});

Route::group(['prefix' => 'excel', 'as' => 'excel.barang.', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'barang'], function () {
        Route::get('/export', [CommodityExportImportController::class, 'export'])->name('export');
        Route::post('/import', [CommodityExportImportController::class, 'import'])->name('import');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/settings', [SettingController::class, 'simpan'])->name('settings.simpan');

    Route::group(['prefix' => 'barang', 'as' => 'barang.'], function () {
        Route::get('/print', [PdfController::class, 'generatePdf'])->name('print');
        Route::get('/print/{id}', [PdfController::class, 'generatePdfOne'])->name('print.one');
    });

    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::resource('/barang', CommodityController::class);
    Route::resource('/bantuan-dana-operasional', SchoolOperationalAssistance::class);
    Route::resource('/ruang', CommodityLocationController::class);

    Route::resource('/commodities/json', CommodityAjaxController::class);
    Route::resource('/school-operational/json', SchoolOperationalAssistanceAjaxController::class);
    Route::resource('/commodity-locations/json', CommodityLocationAjaxController::class);
});