<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;
use PhpParser\Comment;
use League\Flysystem\Exception;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments=Comment::all();
        return response()->json($comments);
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
            $comment = new Comments();

            $comment->id_department = $request->id_department;
            $comment->id_user = $request->id_user;
            $comment->message = $request->message;
            $comment->score = $request->rooms_amount;

            $comment->save();
            return response()->json(['msg' => 'El comentario fue insertado exitosamente']);
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
        $comment = Comments::find($id);
        if($comment){
            $comment->delete();
            return response()->json(['msg' => 'El comentario ha sido eliminado exitosamente.']);
        }else{
            return response()->json(['msg' => 'El comentario no existe.'], 404);
        }
    }
}