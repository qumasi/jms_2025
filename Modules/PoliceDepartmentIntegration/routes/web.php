<?php

use Illuminate\Support\Facades\Route;
use Modules\PoliceDepartmentIntegration\Http\Controllers\PoliceDepartmentIntegrationController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('policedepartmentintegrations', PoliceDepartmentIntegrationController::class)->names('policedepartmentintegration');
});
