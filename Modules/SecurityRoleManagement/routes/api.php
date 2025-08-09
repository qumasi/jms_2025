<?php

use Illuminate\Support\Facades\Route;
use Modules\SecurityRoleManagement\Http\Controllers\SecurityRoleManagementController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('securityrolemanagements', SecurityRoleManagementController::class)->names('securityrolemanagement');
});
