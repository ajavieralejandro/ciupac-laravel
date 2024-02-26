<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Station;
use App\Models\User;

use Illuminate\Support\Facades\Log;
use Http;
use App\Models\stationRegister;





class Kernel extends ConsoleKernel
{
     /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        
        $schedule->call(function () {
        
            $stations= Station::all();
            info($stations->count());
            foreach($stations as $station){
              

                    $api_key = env('API_KEY');
                    $api_token = env('API_TOKEN');
                    $mac = $station->mac;
                    $url = "https://api.ecowitt.net/api/v3/device/real_time?application_key=".$api_key."&api_key=".$api_token."&mac=".$mac."&call_back=all";
                    $response = Http::get($url); 
                    $data= $response->json();
                    $data = $data['data'];
                    if(count($data)>0){
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
                        $stationRegister = new stationRegister;
                        $stationRegister->name = $station->name;
                        $stationRegister->mac = $station->mac;
                        $stationRegister->temperature = $temperature;
                        $stationRegister->feels_like = $feels_like;
                        $stationRegister->humidity = $humidity;
                        $stationRegister->wind = $wind;
                        $stationRegister->dew_point = $rocio;
                        $stationRegister->wind_gust = $wind_gust;
                        $stationRegister->wind_direction = $windDirection;
                        $stationRegister->pressure_absolute = $pressureA;
                        $stationRegister->pressure_relative = $pressureR;
                        $stationRegister->uvi = $uvi;
                        $stationRegister->save();

                    
                   
            
                } 
          
        
            }
           



            
        })->everyTenMinutes();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
