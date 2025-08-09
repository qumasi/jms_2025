<?php

use Illuminate\Support\Facades\Route;
use Modules\LitigantPortal\Http\Controllers\LitigantPortalController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('litigantportals', LitigantPortalController::class)->names('litigantportal');
});
