<?php

use Illuminate\Support\Facades\Route;
use Modules\SecurityRoleManagement\Http\Controllers\SecurityRoleManagementController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('securityrolemanagements', SecurityRoleManagementController::class)->names('securityrolemanagement');
});
