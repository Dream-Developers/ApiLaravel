<?php

namespace App\Http\Controllers;

use App\Factura;
use App\User;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Factura::orderBy("created_at","desc")->get();;
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
            'Nombre' => 'required|string||max:50',
            'Detalle' => 'required|string||max:50',
            'Total' => 'required|numeric|max:999999999',
            'Descuento' => 'required|numeric|max:999999999',
            'Fecha' => 'required|date',
        ]);
        $cita = new Factura([
            'Nombre' => $request->Nombre,
            'Detalle' => $request->Detalle,
            'Descuento' => $request->Descuento,
            'Total' => $request->Total,
            'Fecha' => $request->Fecha
        ]);

        $cita->save();
        return response()->json([
            'message' => 'Factura Creada Exitosamente'], 201);
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
        $cliente = Factura::findOrfail($id);

        return response()->json(["cliente"=>$cliente]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $servicio = Factura::find($id);
        $servicio->Nombre = $request->input('Nombre');
        $servicio->Detalle = $request->input('Detalle');
        $servicio->Total = $request->input('Total');
        $servicio->Fecha = $request->input('Fecha');
        $servicio->Descuento = $request->input('Descuento');
        $servicio->save();


        return response()->json(['updated' => true,
            'message' => 'Se actualizaron los datos correctamente'])
            ->header('Content-Type', 'application/json')->header('X-Requested-With', 'XMLHttpRequest');

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
