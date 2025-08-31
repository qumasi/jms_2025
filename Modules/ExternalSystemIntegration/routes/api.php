<?php

use Illuminate\Support\Facades\Route;
use Modules\ExternalSystemIntegration\Http\Controllers\ExternalSystemController;


Route::prefix('external')->group(function() {

    
    Route::post('/send-case-report', [ExternalSystemController::class, 'sendCaseReport']);

    Route::get('/fetch-external-data', [ExternalSystemController::class, 'fetchExternalData']);
});