<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStationRequest;
use App\Http\Requests\UpdateStationRequest;
use App\Models\Station;
use Http;
use Illuminate\Http\Request;
use App\Models\Configuration;
use \Exception;




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
        return redirect('/verestaciones');
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
        $response; 
        try {
        $stations = Station::paginate(20);
        $station =  Station::find($request->id);
        $mac = ($station->mac);
        $api_key = env('API_KEY');
        $api_token = env('API_TOKEN');
        $url = "https://api.ecowitt.net/api/v3/device/real_time?application_key=".$api_key."&api_key=".$api_token."&mac=".$mac."&call_back=all";
        $response = Http::get($url); 
        $data= $response->json();
        $conf = Configuration::first();
        $data = $data['data'];
        $temperature = $data['outdoor']['temperature']['value'];
        $temperature = 5*($temperature-32)/9;
        $temperature = round($temperature, 1);
        $feels_like = $data['outdoor']['feels_like']['value'];
        $feels_like = 5*($feels_like-32)/9;
        $feels_like = round($feels_like, 1);

        $humidity = $data['outdoor']['humidity']['value'];
        $wind = $data['wind']['wind_speed']['value'];
        $wind_gust = $data['wind']['wind_gust']['value'];
        $rocio = $data['outdoor']['dew_point']['value'];
        $rocio = 5*($rocio-32)/9;
        $rocio= round($temperature, 1);
        $wind = $wind * 1.609;
        $wind= round($wind, 1);
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
        'uvi'=>$uvi,'rain'=>$rain,'stations'=>$stations,'rocio'=>$rocio,
        'wind_gust'=>$wind_gust,'feels_like'=>$feels_like
    ]);
        } catch (Exception $e) {
            return view('estaciones.problemas',['conf'=>$conf,'stations'=>$stations]);

        }
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $station =  Station::find($request->id);
        return view('admin.editstation',['station'=>$station]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStationRequest  $request
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $request->id; 
        $validated = $request->validate([
            'name' => 'required|unique:locations|max:255',
            'longitude' => 'required|numeric|between:-90,90'
            ,
            'latitude' => 'required|numeric|between:-90,90'
            ,
            'mac' =>'mac_address'

        ]);
        $station = Station::whereId($id)->update($validated);


        return redirect('/verestaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $member = Station::find($request->station_id);
        $member->delete();
        return redirect('/verestaciones');
    }
}
