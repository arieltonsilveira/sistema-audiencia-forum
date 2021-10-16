<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaUserValidate;
use App\Models\AgendaUser;
use Illuminate\Http\Request;

class AgendaUsersController extends Controller
{
    private $agendaUser;

    public function __construct()
    {
        $this->agendaUser = new AgendaUser();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response()->json($this->agendaUser->all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgendaUserValidate $request)
    {
        return Response()->json($this->agendaUser->create($request->all()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Response()->json($this->agendaUser->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgendaUserValidate $request, $id)
    {
        return Response()->json($this->agendaUser->find($id)->update($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Response()->json($this->agendaUser->find($id)->delete());
    }
}
