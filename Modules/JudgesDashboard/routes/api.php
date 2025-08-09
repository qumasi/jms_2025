<?php

use Illuminate\Support\Facades\Route;
use Modules\JudgesDashboard\Http\Controllers\JudgesDashboardController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('judgesdashboards', JudgesDashboardController::class)->names('judgesdashboard');
});
