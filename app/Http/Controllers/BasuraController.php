<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBasuraRequest;
use App\Http\Requests\UpdateBasuraRequest;
use App\Models\Basura;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        //
        // Validar los datos del formulario
        $user = Auth::user();
        
        
        // Crear una nueva instancia del modelo Measurement y asignar los datos
        $measurement = new Basura();
        $measurement->fecha_hora = $request->fecha_hora;
        $measurement->user_id = $user->id;
        $measurement->largo_perfil = $request->largo_perfil;
        $measurement->responsable_medicion = $request->responsable_medicion;
        $measurement->localidad = $request->localidad;
        $measurement->sitio_perfil = $request->sitio_perfil;
        $measurement->coincide_perfil = $request->coincide_perfil ? true : false;
        $measurement->hora_bajamar = $request->hora_bajamar;
        $measurement->distancia_pleamar_mojon = $request->distancia_pleamar_mojon;
        $measurement->distancia_agua_pleamar = $request->distancia_agua_pleamar;
        $measurement->personas_sector1 = $request->personas_sector1;
        $measurement->personas_sector2 = $request->personas_sector2;
        $measurement->cestos_area_medicion_1 = $request->cestos_area_medicion_1;
        $measurement->cestos_area_medicion_2 = $request->cestos_area_medicion_2;

        $measurement->cestos_derecha_izquierda = $request->cestos_derecha_izquierda;

        // Guardar la nueva medición en la base de datos
        $measurement->save();
        // Redirigir a una página de éxito o devolver una respuesta JSON
        $data = Location::all();

        return view('admin.Basura.basura',['locations'=>$data]);
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Basura  $basura
     * @return \Illuminate\Http\Response
     */
    public function show(Basura $basura)
    {
        //
        $data = Location::all();

        return view('admin.Basura.basura',['locations'=>$data]);
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
