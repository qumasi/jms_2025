<?php

use Illuminate\Support\Facades\Route;
use Modules\LitigantPortal\Http\Controllers\LitigantPortalController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('litigantportals', LitigantPortalController::class)->names('litigantportal');
});
