<?php

use Illuminate\Support\Facades\Route;
use Modules\ExternalSystemIntegration\Http\Controllers\ExternalSystemIntegrationController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('externalsystemintegrations', ExternalSystemIntegrationController::class)->names('externalsystemintegration');
});
