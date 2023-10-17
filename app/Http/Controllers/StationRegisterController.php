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
        $registers = stationRegister::where('mac',$mac)->get();

       
        return view('admin.registerstation',['registers'=>$registers,'mac'=>$request->mac]);

    }

    public function generateReport(Request $request){
        $mac = $request->mac;
        $date1 = $request->date1;
        $date2 = $request->date2;
        $date1 = str_replace(str_split(
            '/'), '-', $date1);
            $date2 = str_replace(str_split(
                '/'), '-', $date2);

         $date1 = date("Y-m-d", strtotime($date1));
         $date2 = date("Y-m-d", strtotime($date2));
         $ldate = date('Y-m-d H:i:s');
         if($date2>$ldate)
                $date2=$ldate;
        $registers = stationRegister::where([
                ['mac','=',$mac,],
              


                ])
                ->where('created_at','>=',$date1)
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
          // these are the headers for the csv file. Not required but good to have one incase of system didn't recongize it properly
            if($registers->count()>0){
                $headers = array(
                    'Content-Type' => 'text/csv'
                  );
          
          
                  //I am storing the csv file in public >> files folder. So that why I am creating files folder
                  if (!File::exists(public_path()."/files")) {
                      File::makeDirectory(public_path() . "/files");
                  }
          
                  //creating the download file
                  $filename =  public_path("files/download.csv");
                  $handle = fopen($filename, 'w');
          
                  //adding the first row
                  fputcsv($handle, [
                    "name",
                    "temperature",
                    "feels_like",
                    "humidity",
                    "wind",
                    "wind_gust",
                    "dew_point",
                    "wind_direction",
                    "pressure_relative",
                    "pressure_absolute",
                    "uvi",
                    "created_at"
  
                  ]);
          
                  //adding the data from the array
                  //"[{\\,\\"uvi\":\"1\",\"created_at\":\"2023-09-14T19:07:52.000000Z\",\"updated_at\":\"2023-09-14T19:07:52.000000Z\"},{\"id\":2,\"mac\":\"BC:FF:4D:0F:B7:C2\",\"name\":\"Monte hermoson 2\",\"temperature\":14.7,\"feels_like\":14.7,\"humidity\":74,\"wind\":1.1,\"wind_gust\":\"1.1\",\"dew_point\":\"14.7\",\"wind_direction\":\"E\",\"pressure_relative\":\"1010.4\",\"pressure_absolute\":\"1016.1\",\"uvi\":\"2\",\"created_at\":\"2023-09-14T19:13:43.000000Z\",\"updated_at\":\"2023-09-14T19:13:43.000000Z\"}]"
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
                          $register->created_at
        
        
        
                      ]);
          
                  }
                  fclose($handle);
          
                  //download command
                  return  response()->download($filename, "download.csv", $headers);
        
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
          // these are the headers for the csv file. Not required but good to have one incase of system didn't recongize it properly
            if($registers->count()>0){
                $headers = array(
                    'Content-Type' => 'text/csv'
                  );
          
          
                  //I am storing the csv file in public >> files folder. So that why I am creating files folder
                  if (!File::exists(public_path()."/files")) {
                      File::makeDirectory(public_path() . "/files");
                  }
          
                  //creating the download file
                  $filename =  public_path("files/download.csv");
                  $handle = fopen($filename, 'w');
          
                  //adding the first row
                  fputcsv($handle, [
                    "name",
                    "temperature",
                    "feels_like",
                    "humidity",
                    "wind",
                    "wind_gust",
                    "dew_point",
                    "wind_direction",
                    "pressure_relative",
                    "pressure_absolute",
                    "uvi",
                    "created_at"
  
                  ]);
          
                  //adding the data from the array
                  //"[{\\,\\"uvi\":\"1\",\"created_at\":\"2023-09-14T19:07:52.000000Z\",\"updated_at\":\"2023-09-14T19:07:52.000000Z\"},{\"id\":2,\"mac\":\"BC:FF:4D:0F:B7:C2\",\"name\":\"Monte hermoson 2\",\"temperature\":14.7,\"feels_like\":14.7,\"humidity\":74,\"wind\":1.1,\"wind_gust\":\"1.1\",\"dew_point\":\"14.7\",\"wind_direction\":\"E\",\"pressure_relative\":\"1010.4\",\"pressure_absolute\":\"1016.1\",\"uvi\":\"2\",\"created_at\":\"2023-09-14T19:13:43.000000Z\",\"updated_at\":\"2023-09-14T19:13:43.000000Z\"}]"
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
                          $register->created_at
        
        
        
                      ]);
          
                  }
                  fclose($handle);
          
                  //download command
                  return  response()->download($filename, "download.csv", $headers);
        
            }

            return back()->with('message', 'Cannot find records!');           
        
    }
}
