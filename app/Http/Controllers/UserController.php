<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use League\Flysystem\Exception;
use App\Department;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
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
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->phone = $request->phone;

            $user->save();
            return response()->json($user);
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
        $user = User::find($id);
        return response()->json($user);
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
        $user= User::find($id);
        if($user){
            $user->delete();
            return response()->json(['msg' => 'El usuario ha sido eliminado exitosamente.']);
        }else{
            return response()->json(['msg' => 'El usuario no existe.'], 404);
        }
    }

    public function userDepartments($id){
        $user = User::find($id);
        if($user){
            $departments = $user->departments()->get();
            return response()->json($departments);
        }
    }

    public function login($user,$password){
        $authRequestingUser=DB::table('users')
            ->where([['email','=', $user],['password','=',$password],])
            ->get();
        if($authRequestingUser=!null){
            return response()->json($authRequestingUser,200);
        }
        else{
            return response()->json(['msg'=>'No se pudo autenticar'],500);
        }
    }
}
