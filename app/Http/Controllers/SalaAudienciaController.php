<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalaAudienciaValidate;
use App\Models\SalaAudiencia;
use Illuminate\Http\Request;

class SalaAudienciaController extends Controller
{

    private $salaAudiencia;

    public function __construct()
    {
        $this->salaAudiencia = new SalaAudiencia();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response()->json($this->salaAudiencia->all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalaAudienciaValidate $request)
    {
        return Response()->json($this->salaAudiencia->create($request->all()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Response()->json($this->salaAudiencia->find($id), 200);
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
        return Response()->json($this->salaAudiencia->find($id)->update($request->all()), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Response()->json($this->salaAudiencia->find($id)->delete(), 200);
    }
}
