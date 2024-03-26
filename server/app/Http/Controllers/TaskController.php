<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;

class TaskController extends Controller {

    /**
     * create -> Crea un nuevo usuario.
     * getTasks -> Obtiene todos los usuarios registrados.
     * getTask -> Obtiene el detalle de un usuario.
     * setTask -> Actualiza la información de un usuario.
     * destroy -> Elimina un registro de usuario.
     */

     public function create (Request $request) {

        $validator = Validator::make($request->all(), [
            "title" => "required|string",
            "description" => "required|string",
            "user_id" => "required|integer",
            "assigned_to" => "required|integer",
            "status_id" => "required|integer",
        ]);

        //Error Validation
        if($validator -> fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        //Create task
        $task = new Task();
        $task -> title = $request -> title;
        $task -> description = $request -> description;
        $task -> user_id = $request -> user_id;
        $task -> assigned_to = $request -> assigned_to;
        $task -> status_id = $request -> status_id;
        $task -> save();

        return response()->json([
            'msg' => "success",
            "ok" => true,
            "task" => $task
        ]);
     }
     
    /**
     * Finds all tasks from database.
     * @return: 
     *      - msg: success | ok: true | tasks: List of tasks
     * @author: Fede Montenegro
     */
    public function getTasks () {
        $tasks = Task::all();
        
        return response()->json([
            'msg' => "success",
            "ok" => true,
            "tasks" => $tasks
        ]);
    }
    
    /**
     * Finds one task from database.
     * @return: 
     *      - success: msg: success | ok: true | task: task's detail
     *      - Not Found: msg: Not Found | ok: false | task: null
     * @author: Fede Montenegro
     */
    public function getTask ($id) {
        
        $task = Task::find($id);
        
        if(!$task) {
            return response()->json([
                'msg' => "Not Found",
                "ok" => false,
                "task" => $task
            ]);
        };

        return response()->json([
            'msg' => "success",
            "ok" => true,
            "task" => $task
        ]);
    }
    
    /**
     * Update task's data from database.
     * @return: 
     *      - success: msg: success | ok: true | task: task's detail
     * @author: Fede Montenegro
     */
    public function setTask (Request $request, $id) {
        
        $task = Task::find($id);

        $request -> title ? $task -> title = $request -> title : "";
        $request -> description ? $task -> description = $request -> description : "";
        $request -> user_id ? $task -> user_id = $request -> user_id : "";
        $request -> assigned_to ? $task -> assigned_to = $request -> assigned_to : "";
        $request -> status_id ? $task -> status_id = $request -> status_id : "";
        $task -> save();
        
        return response()->json([
            'msg' => "success",
            "ok" => true,
            "task" => $task
        ]);
    }
    
    /**
     * Delete task's data from database.
     * @return: 
     *      - success: msg: success | ok: true | task: task's deleted
     *      - Not Found: msg: Not Found | ok: false | task: null
     * @author: Fede Montenegro
     */
    public function destroy ($id) {

        $task = Task::find($id);

        if(!$task) {
            return response()->json([
                'msg' => "Not Found",
                "ok" => false,
                "task" => $task
            ]);
        };

        $task -> delete();

        return response()->json([
            'msg' => "success",
            "ok" => true,
            "task" => $task
        ]);
    }
};