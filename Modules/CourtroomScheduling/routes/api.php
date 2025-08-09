<?php

use Illuminate\Support\Facades\Route;
use Modules\CourtroomScheduling\Http\Controllers\CourtroomSchedulingController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('courtroomschedulings', CourtroomSchedulingController::class)->names('courtroomscheduling');
});
