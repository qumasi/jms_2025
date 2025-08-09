<?php

use Illuminate\Support\Facades\Route;
use Modules\LawyerPortal\Http\Controllers\LawyerPortalController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('lawyerportals', LawyerPortalController::class)->names('lawyerportal');
});
