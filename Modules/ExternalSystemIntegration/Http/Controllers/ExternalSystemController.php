<?php

namespace Modules\ExternalSystemIntegration\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ExternalSystemController extends Controller
{
    public function sendCaseReport(Request $request)
    {
        $data = $request->all();

        return response()->json([
            'message' => 'Case report sent successfully!',
            'data_sent' => $data,
        ]);
    }

    public function fetchExternalData()
    {
        $externalData = [
            'case_id' => 12345,
            'status' => 'In Progress',
            'assigned_to' => 'Prosecutor Office',
        ];

        return response()->json([
            'message' => 'External data fetched successfully!',
            'external_data' => $externalData,
        ]);
    }
}