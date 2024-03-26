<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;

class CommentController extends Controller {

    /**
     * create -> Crea un nuevo usuario.
     * getComment -> Obtiene todos los comentarios registrados.
     * getComment -> Obtiene el detalle de un comentario.
     * setComment -> Actualiza la información de un comentario.
     * destroy -> Elimina un registro de comentario.
     */

     public function create (Request $request) {

        $validator = Validator::make($request->all(), [
            "content" => "required|string",
            "user_id" => "required|integer",
            "task_id" => "required|integer",
        ]);

        //Error Validation
        if($validator -> fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        //Create comment
        $comment = new Comment();
        $comment -> content = $request -> content;
        $comment -> user_id = $request -> user_id;
        $comment -> task_id = $request -> task_id;
        $comment -> save();

        return response()->json([
            'msg' => "success",
            "ok" => true,
            "comment" => $comment
        ]);
     }
     
    /**
     * Finds all comments from database.
     * @return: 
     *      - msg: success | ok: true | comments: List of comments
     * @author: Fede Montenegro
     */
    public function getComments () {
        $comments = Comment::all();
        
        return response()->json([
            'msg' => "success",
            "ok" => true,
            "comments" => $comments
        ]);
    }
    
    /**
     * Finds all task's comments from database.
     * @return: 
     *      - msg: success | ok: true | comments: List of task's comments
     * @author: Fede Montenegro
     */
    public function getTaskComments ($task_id) {
        $comments = Comment::where("task_id", $task_id)->get();

        return response()->json([
            'msg' => "success",
            "ok" => true,
            "comments" => $comments
        ]);
    }
    
    /**
     * Finds one comments from database.
     * @return: 
     *      - success: msg: success | ok: true | comments: comments's detail
     *      - Not Found: msg: Not Found | ok: false | comments: null
     * @author: Fede Montenegro
     */
    public function getComment ($id) {
        
        $comment = Comment::find($id);
        
        if(!$comment) {
            return response()->json([
                'msg' => "Not Found",
                "ok" => false,
                "comment" => $comment
            ]);
        };

        return response()->json([
            'msg' => "success",
            "ok" => true,
            "comment" => $comment
        ]);
    }
    
    /**
     * Update comment's data from database.
     * @return: 
     *      - success: msg: success | ok: true | comment: comment's detail
     * @author: Fede Montenegro
     */
    public function setComment (Request $request, $id) {
        
        $comment = Comment::find($id);

        $request -> content ? $comment -> content = $request -> content : "";
        $request -> user_id ? $comment -> user_id = $request -> user_id : "";
        $request -> comment_id ? $comment -> comment_id = $request -> comment_id : "";
        $comment -> save();
        
        return response()->json([
            'msg' => "success",
            "ok" => true,
            "comment" => $comment
        ]);
    }
    
    /**
     * Delete comment's data from database.
     * @return: 
     *      - success: msg: success | ok: true | comment: comment's deleted
     *      - Not Found: msg: Not Found | ok: false | comment: null
     * @author: Fede Montenegro
     */
    public function destroy ($id) {

        $comment = Comment::find($id);

        if(!$comment) {
            return response()->json([
                'msg' => "Not Found",
                "ok" => false,
                "comment" => $comment
            ]);
        };

        $comment -> delete();

        return response()->json([
            'msg' => "success",
            "ok" => true,
            "comment" => $comment
        ]);
    }
};