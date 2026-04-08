<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Storage;
use Http;

use App\Models\stationRegister;
use File;

class StationRegisterController extends Controller
{
    //
    public function show(Request $request){
        $mac = $request->mac;
        $registers = stationRegister::where('mac',$mac)->orderBy('created_at', 'desc')->paginate(10);

       
        return view('admin.registerstation',['registers'=>$registers,'mac'=>$request->mac]);

    }

    public function generateReport(Request $request){
        $mac = $request->mac;
        $date1 = $request->date1;
        $date2 = $request->date2;
        //$date1 = str_replace(str_split(
            //'/'), '-', $date1);
            //$date2 = str_replace(str_split(
              //  '/'), '-', $date2);
         //dd((date("Y-m-d", strtotime($date2))));
         $date1 = date("Y-m-d", strtotime($date1));
         $date2 = date("Y-m-d", strtotime($date2));
         $ldate = date('Y-m-d');

         if($date2>$ldate || $date2<$date1)
                $date2=$ldate;
        //dd([$date1,$date2,$ldate]);
        $registers = stationRegister::where([
                ['mac','=',$mac,],['created_at','>=',$date1],
                ['created_at','<=',$date2]
              


                ])
                ->get();
        /*
        $data = [];
        $fileName = '_datafile.txt';
        $file= File::put(public_path('/upload'.$fileName),$data);   
        foreach($registers as $register){
            $data = json_encode($register);

            //File::append(public_path('/upload'.$fileName),$register->name);   
            //File::append(public_path('/upload'.$fileName),$register->mac);      
            fputcsv( $file, $data);



        }

      
        
        return response()->download(public_path('/upload'.$fileName));
        */
            if($registers->count()>0){
                return $this->streamRegistersCsvDownload($registers, 'download.csv');
            }

            return back()->with('message', 'Cannot find records!');
    }

    public function generateAllReports(Request $request){
        $date1 = $request->date1;
        $date2 = $request->date2;
        $date1 = str_replace(str_split(
            '/'), '-', $date1);
            $date2 = str_replace(str_split(
                '/'), '-', $date2);

         $date1 = date("Y-m-d", strtotime($date1));
         $date2 = date("Y-m-d", strtotime($date2));
         $ldate = date('Y-m-d H:i:s');
         if($date2<$date1)
                $date2=$ldate;
        $registers = stationRegister::where([
            ['created_at','>=',$date1,],

          


            ])
            ->where('created_at','<=',$date2)


            ->get();


        /*
        $data = [];
        $fileName = '_datafile.txt';
        $file= File::put(public_path('/upload'.$fileName),$data);   
        foreach($registers as $register){
            $data = json_encode($register);

            //File::append(public_path('/upload'.$fileName),$register->name);   
            //File::append(public_path('/upload'.$fileName),$register->mac);      
            fputcsv( $file, $data);



        }

      
        
        return response()->download(public_path('/upload'.$fileName));
        */
            if($registers->count()>0){
                return $this->streamRegistersCsvDownload($registers, 'download.csv');
            }

            return back()->with('message', 'Cannot find records!');
    }

    protected function streamRegistersCsvDownload($registers, $filename = 'download.csv')
    {
        return response()->streamDownload(function () use ($registers) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, [
                'name',
                'temperature',
                'feels_like',
                'humidity',
                'wind',
                'wind_gust',
                'dew_point',
                'wind_direction',
                'pressure_relative',
                'pressure_absolute',
                'uvi',
                'created_at',
            ]);

            foreach ($registers as $register) {
                fputcsv($handle, [
                    $register->name,
                    $register->temperature,
                    $register->feels_like,
                    $register->humidity,
                    $register->wind,
                    $register->wind_gust,
                    $register->dew_point,
                    $register->wind_direction,
                    $register->pressure_relative,
                    $register->pressure_absolute,
                    $register->uvi,
                    $register->created_at,
                ]);
            }

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv',
        ]);
    }
}
