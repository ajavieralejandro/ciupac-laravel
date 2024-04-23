<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBasuraRequest;
use App\Http\Requests\UpdateBasuraRequest;
use App\Models\Basura;

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
    public function store(StoreBasuraRequest $request)
    {
        //
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
