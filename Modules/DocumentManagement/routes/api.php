<?php

use Illuminate\Support\Facades\Route;
use Modules\DocumentManagement\Http\Controllers\DocumentManagementController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('documentmanagements', DocumentManagementController::class)->names('documentmanagement');
});
