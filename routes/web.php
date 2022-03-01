<?php

use App\Http\Controllers\Importer\CSVImporterController;
use App\Http\Controllers\Importer\ImporterController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Web\PDFPublicController;
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

Route::get('/post', [SiteController::class, 'index']);

Route::redirect('/', '/app')->name('home');

Route::group(['prefix' => 'views'], function () {

    Route::group(['prefix' => 'invoices'], function () {
        Route::get('/invoice/{invoice}', [PDFPublicController::class, 'showInvoice'])->name('public.show.invoice');
    });

    Route::group(['prefix' => 'estimates'], function () {
        Route::get('/{estimate}', [PDFPublicController::class, 'showEstimate'])->name('public.show.estimate');
    });

    Route::group(['prefix' => 'bons'], function () {
        Route::get('/{command}', [PDFPublicController::class, 'showBCommand'])->name('public.show.bcommand');
    });
});



Route::get('/upload', [ImporterController::class, 'index']);
Route::post('/upload', [ImporterController::class, 'upload']);
Route::get('/batch', [ImporterController::class, 'batch']);
