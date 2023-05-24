<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStationRequest;
use App\Http\Requests\UpdateStationRequest;
use App\Models\Station;
use Http;
use Illuminate\Http\Request;
use App\Models\Configuration;


class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $stations = Station::paginate(20);
        return view('admin.stations',['stations'=>$stations]);

    }

    public function showStations()
    {
        
        $stations = Station::paginate(20);
        $conf = Configuration::first();

        return view('estaciones.estaciones',['stations'=>$stations,'conf'=>$conf]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.addStation');
    }

    public function searchStations(Request $request){
        $search = $request->search;
        $stations = Station::query()
        ->where('name', 'LIKE', "%{$search}%")->paginate(20) ;
        $conf = Configuration::first();

        return view('estaciones.estaciones',['stations'=>$stations,'conf'=>$conf]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|unique:locations|max:255',
            'longitude' => 'required|numeric|between:-90,90'
            ,
            'latitude' => 'required|numeric|between:-90,90'
            ,
            'mac' =>'mac_address'

        ]);
        $station = new Station;
        $station->name = $request->name;
        $station->longitude = $request->longitude;
        $station->latitude = $request->latitude;
        $station->mac = $request->mac;
        $station->save();
        return redirect('/estaciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //Retorno la vista con la estación seleccionada
        //Muestro la lista de estaciones
        $stations = Station::paginate(20);
        $station =  Station::find($request->id);
        $mac = ($station->mac);
        $url = "https://api.ecowitt.net/api/v3/device/real_time?application_key=4EA6ECD836442950B747A3955C771EAF&api_key=d71fb4c2-38e0-49e6-b6f8-17ee223edc85&mac=".$mac."&call_back=all";
        $response = Http::get($url); 
        $data= $response->json();
        $conf = Configuration::first();
        $data = $data['data'];
        $temperature = $data['outdoor']['temperature']['value'];
        $temperature = 5*($temperature-32)/9;
        $temperature = round($temperature, 1);
        $humidity = $data['outdoor']['humidity']['value'];
        $wind = $data['wind']['wind_speed']['value'];
        $wind = $wind * 1.609;
        $wind= round($wind, 2);
        $windDirection = $data['wind']['wind_direction']['value'];
        $aux = $windDirection;
        $index = $windDirection % 360;
        $index = Round($index/ 22.5,0);
        $arrayMap = ['N','NNE','NE','ENE','E',
        'ESE','SE','SSE','S','SSW','SW','WSW',
        'W','WNW','NW','NNW','N'];
        $windDirection = $arrayMap[$index];
        $pressureR = $data['pressure']['relative']['value'];
        $pressureA = $data['pressure']['absolute']['value'];
        $rain =  $data['rainfall']['daily']['value'];
        $rain = Round($rain,1);
        $pressureR = 33.86*$pressureR;
        $pressureA = 33.86*$pressureA;

        $pressureR  = Round($pressureR,1);
        $pressureA  = Round($pressureA,1);

        $uvi =  $data['solar_and_uvi']['uvi']['value'];
        return view('estaciones.estacion',['station'=>$station,'conf'=>$conf,
        'temperature'=>$temperature,'humidity'=>$humidity,'wind'=>$wind,
        'windD'=>$windDirection,'pressureA'=>$pressureA,'pressureR'=>$pressureR,
        'uvi'=>$uvi,'rain'=>$rain,'stations'=>$stations
    ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStationRequest  $request
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStationRequest $request, Station $station)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        //
    }
}