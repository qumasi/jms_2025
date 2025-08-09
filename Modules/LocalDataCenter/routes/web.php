<?php

use Illuminate\Support\Facades\Route;
use Modules\LocalDataCenter\Http\Controllers\LocalDataCenterController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('localdatacenters', LocalDataCenterController::class)->names('localdatacenter');
});
