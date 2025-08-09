<?php

use Illuminate\Support\Facades\Route;
use Modules\ProsecutorsOfficeIntegration\Http\Controllers\ProsecutorsOfficeIntegrationController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('prosecutorsofficeintegrations', ProsecutorsOfficeIntegrationController::class)->names('prosecutorsofficeintegration');
});
