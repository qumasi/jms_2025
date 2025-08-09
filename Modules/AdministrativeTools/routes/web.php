<?php

use Illuminate\Support\Facades\Route;
use Modules\AdministrativeTools\Http\Controllers\AdministrativeToolsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('administrativetools', AdministrativeToolsController::class)->names('administrativetools');
});
