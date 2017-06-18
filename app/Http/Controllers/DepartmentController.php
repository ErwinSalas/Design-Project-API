<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments=Department::all();
        return response()->json($departments);
    }

    public function indexOwner($id_owner)
    {
        $departments=Department::owner($id_owner);
        return response()->json($departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $department = new Department();

            $department->id_owner = $request->id_owner;
            $department->description = $request->description;
            $department->address = $request->address;
            $department->rooms_amount = $request->rooms_amount;
            $department->bath_amount = $request->bath_amount;
            $department->internet_service = $request->internet_service;
            $department->light_service = $request->light_service;
            $department->water_service = $request->water_service;
            $department->is_rented = $request->is_rented;
            $department->latitude = $request->latitude;
            $department->longitude = $request->longitude;
            $department->payment_amount = $request->payment_amount;

            $department->save();
            return response()->json(['msg' => 'El departamento fue insertado exitosamente']);
        }catch (Exception $exception){
            $errorMsg = $exception->getMessage();
            return response()->json(['msg' => $errorMsg],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department= Department::find($id);
        return response()->json($department);
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
        $department= Department::find($id);
        if($department){
            $department->delete();
            return response()->json(['msg' => 'El departamento ha sido eliminado exitosamente.']);
        }else{
            return response()->json(['msg' => 'El departamento no existe.'], 404);
        }
    }
}
