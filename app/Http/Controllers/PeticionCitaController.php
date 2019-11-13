<?php

namespace App\Http\Controllers;

use App\Cita;
use App\PeticionCita;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeticionCitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $citas = PeticionCita::all()->where('User_id', '=', $id);
        return response()->json(["citas"=>$citas]);
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
            'Telefono' => 'required',
            'FechaFumigacion' => 'required',
            'Hora' => 'required',
            'User_id'=>'required|max:1',
        ]);
        $cita = new PeticionCita([
            'Nombre' => $request->Nombre,
            'Direccion' => $request->Direccion,
            'Telefono' => $request->Telefono,
            'FechaFumigacion' => $request->FechaFumigacion,
            'Hora' => $request->Hora,
            'User_id' => $request->User_id,
            'Estado_id'=>1,

        ]);

        $cita->save();
        return response()->json([
            'message' => 'Successfully created cita!'], 201);
        //
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
