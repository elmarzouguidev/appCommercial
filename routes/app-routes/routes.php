<?php

use App\Http\Controllers\Administration\Admin\AdminController;
use App\Http\Controllers\Administration\Admin\CalendarController;
use App\Http\Controllers\Administration\Admin\ContactController;
use App\Http\Controllers\Administration\Admin\DashboardController;

use App\Http\Controllers\Administration\PDF\GenerateReportController;
use App\Http\Controllers\Administration\Ticket\TicketController;
use App\Http\Controllers\Administration\Category\CategoryController;
use App\Http\Controllers\Administration\Chat\ChatController;
use App\Http\Controllers\Administration\Email\EmailController;
use App\Http\Controllers\Administration\Client\ClientController;
use App\Http\Controllers\Administration\Diagnostique\DiagnostiqueController;
use App\Http\Controllers\Administration\Import\CSVImportController;
use App\Http\Controllers\Administration\PermissionRole\PermissionRoleController;
use App\Http\Controllers\Administration\Profil\ProfilController;
use App\Http\Controllers\Administration\Reparation\ReparationController;
use App\Http\Controllers\Administration\Warranty\WarrantyController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [DashboardController::class, 'index'])->name('home');
Route::get('/admin/tickets-livrable', [DashboardController::class, 'ticketLivrable'])->name('tickets.livrable');
Route::post('/admin/tickets-livrable', [DashboardController::class, 'confirmLivrable'])->name('tickets.livrablePost');
Route::post('/admin/tickets-livrable-admin', [DashboardController::class, 'confirmLivrableAdmin'])->name('tickets.livrablePostAdmin');

Route::get('/admin/tickets-invoiceable', [DashboardController::class, 'invoiceable'])->name('tickets.invoiceable');

Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');

Route::group(['prefix' => 'auth', 'middleware' => ['role:SuperAdmin']], function () {

    Route::group(['prefix' => 'admins'], function () {

        Route::get('/', [AdminController::class, 'index'])->name('admins');
        Route::get('/create', [AdminController::class, 'create'])->name('admins.create');
        Route::post('/create', [AdminController::class, 'store'])->name('admins.createPost');
        Route::delete('/delete', [AdminController::class, 'delete'])->name('admins.delete');

        Route::get('/edit/{admin}', [AdminController::class, 'edit'])->name('admins.edit');
        Route::post('/edit/{admin}', [AdminController::class, 'update'])->name('admins.update');

        //Route::get('/edit/permissions/{admin}', [AdminController::class, 'edit'])->name('admins.edit');
        Route::post('/edit/permissions/{user}', [AdminController::class, 'syncPermission'])->name('admins.syncPermissions');
    });

});

Route::group(['prefix' => 'tickets'], function () {

    Route::get('/', [TicketController::class, 'index'])->name('tickets.list');
    Route::get('/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/create', [TicketController::class, 'store'])->name('tickets.createPost');
    Route::delete('/delete', [TicketController::class, 'delete'])->name('tickets.delete');

    Route::group(['prefix' => 'overview'], function () {

        Route::get('/ticket/{ticket}', [TicketController::class, 'show'])->name('tickets.single');
        Route::get('/ticket/edit/{ticket}', [TicketController::class, 'edit'])->name('tickets.edit');
        Route::put('/ticket/edit/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
        Route::post('/ticket/edit/{ticket}', [TicketController::class, 'attachements'])->name('tickets.attachements');
        Route::post('/ticket/download-files', [TicketController::class, 'downloadFiles'])->name('tickets.downloadFiles');
    });

    Route::group(['prefix' => 'diagnose'], function () {

        Route::get('/{ticket}', [DiagnostiqueController::class, 'diagnose'])->name('tickets.diagnose');
        Route::post('/{ticket}', [DiagnostiqueController::class, 'storeDiagnose'])->name('tickets.diagnose.store');

        Route::post('/send-report/{ticket}', [DiagnostiqueController::class, 'sendReport'])->name('tickets.diagnose.send-report');
        Route::post('/send-confirm/{ticket}', [DiagnostiqueController::class, 'sendConfirm'])->name('tickets.diagnose.send-confirm');
    });

    Route::group(['prefix' => 'media'], function () {
        Route::get('/{ticket}', [TicketController::class, 'media'])->name('tickets.media');
        Route::delete('/{ticket}', [TicketController::class, 'deleteMedia'])->name('tickets.media.delete');
    });

    Route::group(['prefix' => 'historiques'], function () {
        Route::get('/{uuid}', [TicketController::class, 'historical'])->name('tickets.historical');
    });

    Route::group(['prefix' => 'all'], function () {
        Route::get('/', [TicketController::class, 'all'])->name('tickets.list.all');
    });

    Route::group(['prefix' => 'PDF_/ticket'], function () {
        Route::get('/{ticket}', [GenerateReportController::class, 'ticketReport'])->name('tickets.report.generate');
    });
});

Route::group(['prefix' => 'diagnostic'], function () {
    Route::get('/', [DiagnostiqueController::class, 'index'])->name('diagnostic.index');
});

Route::group(['prefix' => 'reparations'], function () {

    Route::get('/', [ReparationController::class, 'index'])->name('reparations.index');

    Route::group(['prefix' => 'overview'], function () {

        Route::get('/ticket/{ticket}', [ReparationController::class, 'single'])->name('reparations.single');
        Route::post('/ticket/{ticket}', [ReparationController::class, 'store'])->name('reparations.store');
        Route::post('/ticket/repear-complet/{ticket}', [ReparationController::class, 'repearComplet'])->name('reparations.complet');
    });
});

Route::group(['prefix' => 'categories'], function () {

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/categories', [CategoryController::class, 'delete'])->name('categories.delete');

    Route::group(['prefix' => 'overview'], function () {
    });
});

Route::group(['prefix' => 'discussion'], function () {

    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

    Route::group(['prefix' => 'overview'], function () {
    });
});

Route::group(['prefix' => 'emails'], function () {

    Route::get('/inbox', [EmailController::class, 'index'])->name('emails.inbox');

    Route::group(['prefix' => 'overview'], function () {
        Route::get('/email', [EmailController::class, 'show'])->name('emails.show');
    });
});

Route::group(['prefix' => 'clients'], function () {

    Route::get('/', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/create', [ClientController::class, 'store'])->name('clients.createPost');
    Route::delete('/', [ClientController::class, 'delete'])->name('clients.delete');

    Route::get('/edit/{client}', [ClientController::class, 'edit'])->name('client.edit');
    Route::post('/edit/{client}', [ClientController::class, 'update'])->name('client.update');
    Route::post('/edit/{client}/emails', [ClientController::class, 'addEmails'])->name('client.add.emails');

    Route::delete('edit/delete-phone', [ClientController::class, 'deletePhone'])->name('client.delete.phone');
    Route::delete('edit/delete-email', [ClientController::class, 'deleteEmail'])->name('client.delete.email');

    Route::group(['prefix' => 'overview'], function () {
        Route::get('/client/{client}', [ClientController::class, 'show'])->name('clients.show');
    });
});

Route::group(['prefix' => 'permissions-and-roles', 'middleware' => ['role:SuperAdmin']], function () {

    Route::get('/roles', [PermissionRoleController::class, 'index'])->name('permissions-roles.index');
    Route::post('/roles', [PermissionRoleController::class, 'createRole'])->name('permissions-roles.add');
    Route::delete('/roles', [PermissionRoleController::class, 'deleteRole'])->name('permissions-roles.delete');

    Route::get('/permissions', [PermissionRoleController::class, 'indexPermission'])->name('permissions-roles.permissions');
    Route::post('/permissions', [PermissionRoleController::class, 'createPermission'])->name('permissions-roles.add.permissions');
    Route::delete('/permissions', [PermissionRoleController::class, 'deletePermission'])->name('permissions-roles.delete.permissions');
});


Route::group(['prefix' => 'files-importers', 'middleware' => 'role:SuperAdmin'], function () {

    Route::get('/csv', [CSVImportController::class, 'index'])->name('files.importers.csv');
});

Route::group(['prefix' => 'profile'], function () {

    Route::get('/', [ProfilController::class, 'index'])->name('profile.index');

    Route::get('/settings', [ProfilController::class, 'settings'])->name('profile.settings');
    Route::post('/settings', [ProfilController::class, 'update'])->name('profile.settings.update');
});


Route::group(['prefix' => 'warranties'], function () {

    Route::get('/', [WarrantyController::class, 'index'])->name('warranty.index');

    Route::get('/create', [WarrantyController::class, 'create'])->name('warranty.create');
    Route::post('/create', [WarrantyController::class, 'store'])->name('warranty.store');


});
