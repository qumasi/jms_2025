<?php

use Illuminate\Support\Facades\Route;
use Modules\CourtroomScheduling\Http\Controllers\CourtroomSchedulingController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('courtroomschedulings', CourtroomSchedulingController::class)->names('courtroomscheduling');
});
