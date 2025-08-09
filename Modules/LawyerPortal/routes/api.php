<?php

use Illuminate\Support\Facades\Route;
use Modules\LawyerPortal\Http\Controllers\LawyerPortalController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('lawyerportals', LawyerPortalController::class)->names('lawyerportal');
});
