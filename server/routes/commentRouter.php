<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

Route::post("create", [CommentController::class, "create"])->name("comments.create");
Route::get("", [CommentController::class, "getComments"])->name("comments.getComments");
Route::get("/task/{task_id}", [CommentController::class, "getTaskComments"])->name("comments.getTaskComments");
Route::get("/{id}", [CommentController::class, "getComment"])->name("comments.getComment");
Route::patch("/{id}", [CommentController::class, "setComment"])->name("comments.setComment");
Route::delete("/{id}", [CommentController::class, "destroy"])->name("comments.destroy");