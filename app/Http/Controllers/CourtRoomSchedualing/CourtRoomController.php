<?php

namespace App\Http\Controllers\CourtRoomSchedualing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourtRoomController extends Controller
{

    public function showSchedule()
    {
        return view('courtroom-schedualing.schedual-room');
    }

    public function createSchedule()
    {
        return view('courtroom-schedualing.create-schedule');
    }

    public function storeSchedule(Request $request)
    {
        // Validate and store the schedule data
        // Redirect or return a response
    }

}
