<?php

use Illuminate\Support\Facades\Route;
use Modules\SearchRetrieval\Http\Controllers\SearchRetrievalController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('searchretrievals', SearchRetrievalController::class)->names('searchretrieval');
});
