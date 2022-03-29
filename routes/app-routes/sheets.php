<?php

use App\Http\Controllers\Sheet\SheetController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'sheet'], function () {


    Route::get('/', [SheetController::class, 'index'])->name('home');

    Route::post('/', [SheetController::class, 'create'])->name('create');
    Route::get('/{sheet}', [SheetController::class, 'view'])->name('view');
    Route::put('/{sheet}', [SheetController::class, 'update'])->name('update');
});
