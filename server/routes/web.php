<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("users")->group(function() {
    include __DIR__."/usersRouter.php";
  });

Route::prefix("tasks")->group(function() {
    include __DIR__."/tasksRouter.php";
  });
 
Route::prefix("comments")->group(function() {
    include __DIR__."/commentRouter.php";
  });
 
Route::prefix("archives")->group(function() {
    include __DIR__."/archivesRouter.php";
  });


//Route to generate csrf tokens
Route::get('/csrf-token', function() {
    return response()->json(['token' => csrf_token()]);
})->name("token");