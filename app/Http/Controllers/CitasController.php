<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Cita;

class CitasController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $request->validate([
            'Nombre' => 'required|string',
            'Direccion' => 'required|string',
            'Precio' => 'required',
            'FechaFumigacion' => 'required',
            'FechaProxima' => 'required',
            'Hora' => 'required',
        ]);
        $cita = new Cita([
            'Nombre' => $request->Nombre,
            'Direccion' => $request->Direccion,
            'Precio' => $request->Precio,
            'FechaFumigacion' => $request->FechaFumigacion,
            'FechaProxima' => $request->FechaProxima= Carbon::parse($request->FechaProxima)->addMonth(6),
            'Hora' => $request->Hora

        ]);

        $cita->save();
        return response()->json([
            'message' => 'Successfully created cita!'], 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
