<?php

use Illuminate\Support\Facades\Route;
use Modules\AdministrativeTools\Http\Controllers\AdministrativeToolsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('administrativetools', AdministrativeToolsController::class)->names('administrativetools');
});
