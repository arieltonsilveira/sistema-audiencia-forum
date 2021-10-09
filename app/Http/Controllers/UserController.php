<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserValidate;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{

    private $user;

    public function __construct()
    {
        $this->user = new User();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response()->json($this->user->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserValidate $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        return Response()->json($this->user->create($data), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Response()->json($this->user->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserValidate $request, $id)
    {
        $data = $request->all();
        if ($request->input('password')) {
            $data['password'] = Hash::make($data['password']);
        }

        return Response()->json($this->user->find($id)->update($data));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Response()->json($this->user->find($id)->delete());
    }
}
