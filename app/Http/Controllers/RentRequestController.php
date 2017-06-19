<?php

namespace App\Http\Controllers;

use App\Department;
use App\RentRequest;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class RentRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rents_request = RentRequest::all();
        return response()->json($rents_request);
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
        try{
            $rent_request = new RentRequest();

            $rent_request->applicant_name = $request->applicant_name;
            $rent_request->department_name = $request->department_name;
            $rent_request->id_department = $request->id_department;
            $rent_request->id_applicant = $request->id_applicant;

            $rent_request->save();
            return response()->json(['msg' => 'La solicitud se envio exitosamente']);
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

    public function acceptRequest($id){
        try{
            $rent_request = RentRequest::find($id);
            $rent_request->status = 'aceptada';
            $rent_request->save();

            $department = $rent_request->department();                                  //Department::find($rent_request->id_department);
            $department->is_rented = true;
            $department->save();

            return response()->json(['msg' => 'Se aprobo la solicitud!']);
        }catch (Exception $exception){
            $errorMsg = $exception->getMessage();
            return response()->json(['msg' => $errorMsg],500);
        }
    }
}
