<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/case', function () {
    return view('case_view');
})->middleware('auth');