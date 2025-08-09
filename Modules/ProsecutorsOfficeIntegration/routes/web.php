<?php

use Illuminate\Support\Facades\Route;
use Modules\ProsecutorsOfficeIntegration\Http\Controllers\ProsecutorsOfficeIntegrationController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('prosecutorsofficeintegrations', ProsecutorsOfficeIntegrationController::class)->names('prosecutorsofficeintegration');
});
