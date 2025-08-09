<?php

use Illuminate\Support\Facades\Route;
use Modules\LocalDataCenter\Http\Controllers\LocalDataCenterController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('localdatacenters', LocalDataCenterController::class)->names('localdatacenter');
});
