<?php

use App\Http\Controllers\Developper\DevController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/clear', [DevController::class, 'clearTables'])->name('truncateModels');
Route::get('/link', [DevController::class, 'storageLink']);

Route::get('/migrate', function () {
    Artisan::call('migrate', [
        '--force' => true
    ]);
});

Route::get('/db-seed', function () {
    Artisan::call('db:seed', [
        '--force' => true
    ]);
});

Route::get('/optimize', function () {
    Artisan::call('optimize');
});
Route::get('/optimize-clear', function () {
    Artisan::call('optimize:clear');
});

Route::get('/cache-config', function () {
    Artisan::call('config:cache');
});
Route::get('/cache-route', function () {
    Artisan::call('route:cache');
});
Route::get('/cache-view', function () {
    Artisan::call('view:cache');
});

Route::get('/clear-config', function () {
    Artisan::call('config:clear');
});
Route::get('/clear-route', function () {
    Artisan::call('route:clear');
});
Route::get('/clear-view', function () {
    Artisan::call('view:clear');
});

Route::get('/app-down', function () {
    Artisan::call('down');
});

Route::get('/app-up', function () {
    Artisan::call('up');
});
