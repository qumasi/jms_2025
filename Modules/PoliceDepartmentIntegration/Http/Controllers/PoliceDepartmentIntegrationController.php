<?php

namespace Modules\PoliceDepartmentIntegration\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PoliceDepartmentIntegrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('policedepartmentintegration::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('policedepartmentintegration::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('policedepartmentintegration::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('policedepartmentintegration::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
