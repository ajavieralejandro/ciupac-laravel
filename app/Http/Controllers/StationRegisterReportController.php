<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStationRegisterReportRequest;
use App\Http\Requests\UpdateStationRegisterReportRequest;
use App\Models\StationRegisterReport;

class StationRegisterReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStationRegisterReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStationRegisterReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StationRegisterReport  $stationRegisterReport
     * @return \Illuminate\Http\Response
     */
    public function show(StationRegisterReport $stationRegisterReport)
    {
        //
        return view('admin.uploadReport');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StationRegisterReport  $stationRegisterReport
     * @return \Illuminate\Http\Response
     */
    public function edit(StationRegisterReport $stationRegisterReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStationRegisterReportRequest  $request
     * @param  \App\Models\StationRegisterReport  $stationRegisterReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStationRegisterReportRequest $request, StationRegisterReport $stationRegisterReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StationRegisterReport  $stationRegisterReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(StationRegisterReport $stationRegisterReport)
    {
        //
    }
}
