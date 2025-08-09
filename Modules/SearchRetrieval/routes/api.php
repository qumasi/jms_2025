<?php

use Illuminate\Support\Facades\Route;
use Modules\SearchRetrieval\Http\Controllers\SearchRetrievalController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('searchretrievals', SearchRetrievalController::class)->names('searchretrieval');
});
