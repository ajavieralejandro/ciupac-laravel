<?php

namespace App\Http\Controllers;
use App\Models\Configuration;

use App\Http\Requests\StoreBasuraRequest;
use App\Http\Requests\UpdateBasuraRequest;
use App\Models\Basura;
use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class BasuraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = Auth::user()->id;
        $basuras = Basura::where('user_id','=',$user_id)->paginate(10);
        return view('admin.Basura.table',['basuras'=>$basuras]);
    }

    public function getMonthMeditions(Request $request){
        // Get the current date
        $month = $request->month;
        $today = Carbon::now();
        
        // Calculate the start and end dates for the last month
        $startDate = $today->copy()->subMonth()->startOfMonth();
        $endDate = $today->copy()->subMonth()->endOfMonth();

        // Fetch waste data grouped by location
        $wasteData = Basura::with('localidad') // Eager load the localidad relationship
            ->whereMonth('fecha_hora','=',$month)
            ->get()
            ->groupBy('localidad_id')->toArray();
         // Group by localidad_id
        // Prepare the response data
            // Return the data as a JSON response
        return view('admin.Basura.map',['basuras'=>$wasteData]);

    }

    public function medicionesBasura(){
        $basuras = Basura::with('localidad')->get();
        $localidades = [];
        $mediciones = [];
        //obtengo las las locaciones
        foreach($basuras as $key=>$basura){
            $localidad = Location::where('id','=',$basura->id)->get()->first();
            $localidades[$key]=($localidad);
        }
       
        foreach($localidades as $key=>$localidad){
            $medicion = Basura::where('localidad','=',$localidad->id)->orderby('created_at', 'desc')->first();
            $medicion->localidad_medicion = $localidad;
            $mediciones[$key]= $medicion;
        }
        $conf = Configuration::first();

        return view('admin.Basura.map',['mediciones'=>$mediciones,'conf'=>$conf]);

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
     * @param  \App\Http\Requests\StoreBasuraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    try{
        // Validar los datos del formulario
 $user = Auth::user();
 $validation = $request->validate([
     'fecha_hora' => 'required|date',
     'largo_perfil' => 'required|string|max:255',
     'responsable_medicion' => 'required|string|max:255',
     'localidad_id' => 'required|exists:locations,id',
     'sitio_perfil' => 'required|string|max:255',
     'hora_bajamar' => 'required|date_format:H:i',
     'distancia_pleamar_mojon' => 'required|integer',
     'distancia_agua_pleamar' => 'required|integer',
     'personas_sector1' => 'required|integer',
     'personas_sector2' => 'required|integer',
     'cestos_area_medicion_1' => 'required|integer',
     'cestos_area_medicion_2' => 'required|integer',
     'cestos_derecha_izquierda' => 'required|integer',
     'residuos_papel' => 'required|integer',
            'residuos_goma' => 'required|integer',
            'residuos_vidrio' => 'required|integer',
            'residuos_ceramica' => 'required|integer',
            'residuos_cigarrillos' => 'required|integer',
            'desechos_sanitarios' => 'required|integer',
            'residuos_ropa' => 'required|integer',
            'residuos_madera' => 'required|integer',
            'residuos_metal' => 'required|integer',
            'residuos_otros' => 'required|integer',
 ]);
 //Mandar mensaje si hay error de validaciòn
 // Crear una nueva instancia del modelo Measurement y asignar los datos
 $measurement = new Basura();
 $measurement->fecha_hora = $request->fecha_hora;
 $measurement->user_id = $user->id;
 $measurement->largo_perfil = $request->largo_perfil;
 $measurement->responsable_medicion = $request->responsable_medicion;
 $measurement->localidad_id = $request->localidad_id;
 $measurement->sitio_perfil = $request->sitio_perfil;
 $measurement->coincide_perfil = $request->coincide_perfil? true : false;
 $measurement->hora_bajamar = $request->hora_bajamar;
 $measurement->distancia_pleamar_mojon = $request->distancia_pleamar_mojon;
 $measurement->distancia_agua_pleamar = $request->distancia_agua_pleamar;
 $measurement->personas_sector1 = $request->personas_sector1;
 $measurement->personas_sector2 = $request->personas_sector2;
 $measurement->cestos_area_medicion_1 = $request->cestos_area_medicion_1;
 $measurement->cestos_area_medicion_2 = $request->cestos_area_medicion_2;
 $measurement->cestos_derecha_izquierda = $request->cestos_derecha_izquierda;
 $measurement->residuos_papel = $request->residuos_papel;
 $measurement->residuos_goma = $request->residuos_goma;
 $measurement->residuos_vidrio = $request->residuos_vidrio;
 $measurement->residuos_ceramica = $request->residuos_ceramica;
 $measurement->residuos_cigarrillos = $request->residuos_cigarrillos;
 $measurement->desechos_sanitarios = $request->desechos_sanitarios;
 $measurement->residuos_ropa = $request->residuos_ropa;
 $measurement->residuos_madera = $request->residuos_madera;
 $measurement->residuos_metal = $request->residuos_metal;
 $measurement->residuos_otros = $request->residuos_otros;
 /**
  *   
  */
 // Guardar la nueva medición en la base de datos
 $measurement->save();
 // Redirigir a una página de éxito o devolver una respuesta JSON
 //$data = Location::all();

 return redirect()->route('userDashboard')->with('status', 'You have been redirected!');

        }
        catch (ValidationException $e) {
            // Catch any exceptions and dump the error message
            dd($e->getMessage());
        }
    }
       
        //
       

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Basura  $basura
     * @return \Illuminate\Http\Response
     */
    public function show(Basura $basura)
    {
        //
        $data = Auth::user()->locations()->get();
        $users = User::all();
        return view('admin.Basura.basura',['localidades'=>$data,'users'=>$users]);
 
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Basura  $basura
     * @return \Illuminate\Http\Response
     */
    public function edit(Basura $basura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBasuraRequest  $request
     * @param  \App\Models\Basura  $basura
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBasuraRequest $request, Basura $basura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Basura  $basura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Basura $basura)
    {
        //
    }
}
