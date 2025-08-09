<?php

use Illuminate\Support\Facades\Route;
use Modules\PoliceDepartmentIntegration\Http\Controllers\PoliceDepartmentIntegrationController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('policedepartmentintegrations', PoliceDepartmentIntegrationController::class)->names('policedepartmentintegration');
});
