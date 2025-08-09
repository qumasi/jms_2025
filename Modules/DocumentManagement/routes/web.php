<?php

use Illuminate\Support\Facades\Route;
use Modules\DocumentManagement\Http\Controllers\DocumentManagementController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('documentmanagements', DocumentManagementController::class)->names('documentmanagement');
});
