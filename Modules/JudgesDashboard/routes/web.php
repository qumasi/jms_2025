<?php

use Illuminate\Support\Facades\Route;
use Modules\JudgesDashboard\Http\Controllers\JudgesDashboardController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('judgesdashboards', JudgesDashboardController::class)->names('judgesdashboard');
});
