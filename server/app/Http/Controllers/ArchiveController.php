<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Archive;

class ArchiveController extends Controller {

    /**
     * create -> Crea un nuevo archivo.
     * getArchives -> Obtiene todos los archivos registrados.
     * getArchive -> Obtiene el detalle de un archivo.
     * setArchive -> Actualiza la información de un archivo.
     * destroy -> Elimina un registro de archivo.
     */

     public function create (Request $request) {

        $validator = Validator::make($request->all(), [
            "path" => "required|string",
            "user_id" => "required|integer",
            "comment_id" => "required|integer",
        ]);

        //Error Validation
        if($validator -> fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        //Create archive
        $archive = new Archive();
        $archive -> path = $request -> path;
        $archive -> user_id = $request -> user_id;
        $archive -> comment_id = $request -> comment_id;
        $archive -> save();

        return response()->json([
            'msg' => "success",
            "ok" => true,
            "archive" => $archive
        ]);
     }
     
    /**
     * Finds all archives from database.
     * @return: 
     *      - msg: success | ok: true | archives: List of archives
     * @author: Fede Montenegro
     */
    public function getArchives () {
        $archives = Archive::all();
        
        return response()->json([
            'msg' => "success",
            "ok" => true,
            "archives" => $archives
        ]);
    }
    
    /**
     * Finds all comment's archives from database.
     * @return: 
     *      - msg: success | ok: true | archives: List of comment's archives
     * @author: Fede Montenegro
     */
    public function getCommentArchives ($comment_id) {
        $archives = Archive::where("comment_id", $comment_id)->get();

        return response()->json([
            'msg' => "success",
            "ok" => true,
            "archives" => $archives
        ]);
    }
    
    /**
     * Finds one archives from database.
     * @return: 
     *      - success: msg: success | ok: true | archive: archive's detail
     *      - Not Found: msg: Not Found | ok: false | archive: null
     * @author: Fede Montenegro
     */
    public function getArchive ($id) {
        
        $archive = Archive::find($id);
        
        if(!$archive) {
            return response()->json([
                'msg' => "Not Found",
                "ok" => false,
                "archive" => $archive
            ]);
        };

        return response()->json([
            'msg' => "success",
            "ok" => true,
            "archive" => $archive
        ]);
    }
    
    /**
     * Update archive's data from database.
     * @return: 
     *      - success: msg: success | ok: true | archive: archive's detail
     * @author: Fede Montenegro
     */
    public function setArchive (Request $request, $id) {
        
        $archive = Archive::find($id);

        $request -> path ? $archive -> path = $request -> path : "";
        $request -> user_id ? $archive -> user_id = $request -> user_id : "";
        $request -> comment_id ? $archive -> comment_id = $request -> comment_id : "";
        $archive -> save();
        
        return response()->json([
            'msg' => "success",
            "ok" => true,
            "archive" => $archive
        ]);
    }
    
    /**
     * Delete archive's data from database.
     * @return: 
     *      - success: msg: success | ok: true | archive: archive's deleted
     *      - Not Found: msg: Not Found | ok: false | archive: null
     * @author: Fede Montenegro
     */
    public function destroy ($id) {

        $archive = Archive::find($id);

        if(!$archive) {
            return response()->json([
                'msg' => "Not Found",
                "ok" => false,
                "archive" => $archive
            ]);
        };

        $archive -> delete();

        return response()->json([
            'msg' => "success",
            "ok" => true,
            "archive" => $archive
        ]);
    }
};