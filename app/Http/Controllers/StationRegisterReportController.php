<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStationRegisterReportRequest;
use App\Http\Requests\UpdateStationRegisterReportRequest;
use App\Models\StationRegisterReport;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
        $count = StationRegisterReport::count();
        $article = new StationRegisterReport;
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            "document" => "required|mimes:pdf,xlsx"
    
           ]);
           $document = $request->file('document');
           $extension = $document->extension();
           $uniqueFileName = $request->name.'.'.$extension;
     
     $request->file('document')->move(public_path('public/reports/'), $uniqueFileName);
           
           $article->station_id = $request->station_id;
           $article->name = $request->name+"station_"+$station_id+"_"+$count;
           $article->path = "public/reports/".$uniqueFileName;
 
        $article->save();

        return redirect('/verestaciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StationRegisterReport  $stationRegisterReport
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $station_id = $request->route('id');
        return view('admin.uploadReport',["station_id"=>$station_id]);
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
