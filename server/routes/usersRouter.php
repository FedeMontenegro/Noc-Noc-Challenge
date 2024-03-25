<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post("create", [UserController::class, "create"])->name("users.create");
Route::get("", [UserController::class, "getUsers"])->name("users.getUsers");
Route::get("/{id}", [UserController::class, "getUser"])->name("users.getUser");
Route::patch("/{id}", [UserController::class, "setUser"])->name("users.setUser");
Route::delete("/{id}", [UserController::class, "destroyUser"])->name("users.destroyUser");