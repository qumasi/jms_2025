<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/courtroom/schedule', function () {
    // based on controller
    return (new \App\Http\Controllers\CourtRoomSchedualing\CourtRoomController())->showSchedule();
});

Route::get('/search/document', function () {
    // based on controller
    return view('search-retrival.search-document');
});

Route::get('/search/document', function () {
    // based on controller
    return view('search-retrival.search-document');
});
