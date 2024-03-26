<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchiveController;

Route::post("create", [ArchiveController::class, "create"])->name("archives.create");
Route::get("", [ArchiveController::class, "getArchives"])->name("archives.getArchives");
Route::get("/comments/{comment_id}", [ArchiveController::class, "getCommentArchives"])->name("archives.getCommentArchives");
Route::get("/{id}", [ArchiveController::class, "getArchive"])->name("archives.getArchive");
Route::patch("/{id}", [ArchiveController::class, "setArchive"])->name("archives.setArchive");
Route::delete("/{id}", [ArchiveController::class, "destroy"])->name("archives.destroy");