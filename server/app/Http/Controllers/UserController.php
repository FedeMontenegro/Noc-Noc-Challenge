<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    /**
     * Create new user from database.
     * @return: 
     *      - success: msg: success | ok: true | user: user registred
     *      - error: redirect to previous page and returns info about error occurred.
     * @author: Fede Montenegro
     */
     public function create (Request $request) {

        $validator = Validator::make($request->all(), [
            "email" => "required|email",/* 
            "password" => "min:7|max:15", */
            "role_id" => "required|integer",
        ]);

        //Error Validation
        if($validator -> fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        //Create user
        $user = new User();
        $user -> email = $request -> email;
        $request -> password ? $user -> password = bcrypt($request -> password) : ""; //If request contains password field, then will be encrypted and saved, else, will be ignored.
        $user -> role_id = $request -> role_id;
        $user -> save();

        return response()->json([
            'msg' => "success",
            "ok" => true,
            "user" => $user
        ]);
    }
    
    /**
     * Finds all users from database.
     * @return: 
     *      - msg: success | ok: true | users: List of users
     * @author: Fede Montenegro
     */
    public function getUsers () {
        $users = User::all();
        
        return response()->json([
            'msg' => "success",
            "ok" => true,
            "users" => $users
        ]);
    }
    
    /**
     * Finds one user from database.
     * @return: 
     *      - success: msg: success | ok: true | user: user's detail
     *      - Not Found: msg: Not Found | ok: false | user: null
     * @author: Fede Montenegro
     */
    public function getUser ($id) {
        
        $user = User::find($id);
        
        if(!$user) {
            return response()->json([
                'msg' => "Not Found",
                "ok" => false,
                "user" => $user
            ]);
        };

        return response()->json([
            'msg' => "success",
            "ok" => true,
            "user" => $user
        ]);
    }
    
    /**
     * Update user's data from database.
     * @return: 
     *      - success: msg: success | ok: true | user: user's detail
     * @author: Fede Montenegro
     */
    public function setUser (Request $request, $id) {
        
        $user = User::find($id);
        
        $request -> password ? $user -> password = $request -> password : "";
        $request -> email ? $user -> email = $request -> email : "";
        $request -> role_id ? $user -> role_id = $request -> role_id : "";
        $user -> save();
        
        return response()->json([
            'msg' => "success",
            "ok" => true,
            "user" => $user
        ]);
    }
    
    /**
     * Delete user's data from database.
     * @return: 
     *      - success: msg: success | ok: true | user: user's deleted
     *      - Not Found: msg: Not Found | ok: false | user: null
     * @author: Fede Montenegro
     */
    public function destroyUser ($id) {
        
        $user = User::find($id);

        if(!$user) {
            return response()->json([
                'msg' => "Not Found",
                "ok" => false,
                "user" => $user
            ]);
        };

        $user -> delete();

        return response()->json([
            'msg' => "success",
            "ok" => true,
            "user" => $user
        ]);
    }
    
    /**
     * Login user.
     * @return: 
     *      - success: msg: success | ok: true | user: user's data | token: jwt token
     *      - Not Found: Redirect to previous url with an error message.
     * @author: Fede Montenegro
     */
    public function login (Request $request) {
        
        //Validate user data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Try authentication
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

        //token JWT
        $token = $user->createToken('AuthToken')->plainTextToken;

        return json_encode([
            "msg" => "success",
            "ok" => true,
            'user' => $user,
            'token' => $token,
        ]);
    } else {
        return json_encode([
            "msg" => "failed",
            "ok" => false,
            'user' => $user,
            "credentials" => $credentials
        ]);
    }
    }
    
    /**
     * Logout user.
     * @return: 
     *      - success: msg: success | ok: true
     * @author: Fede Montenegro
     */
    public function logout(Request $request) {
        Auth::logout();

        return response()->json([
            "msg" => "success",
            "ok" => true,
        ]);
    }
}