<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::post("create", [TaskController::class, "create"])->name("tasks.create");
Route::get("", [TaskController::class, "getTasks"])->name("tasks.getTasks");
Route::get("/{id}", [TaskController::class, "getTask"])->name("tasks.getTask");
Route::patch("/{id}", [TaskController::class, "setTask"])->name("tasks.setTask");
Route::delete("/{id}", [TaskController::class, "destroy"])->name("tasks.destroy");