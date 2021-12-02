<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/todo/create",[TodoController::class,"create_todo"]);
Route::get("/todos",[TodoController::class,"list"]);
Route::get("/todos/{id}",[TodoController::class,"detail_todo"]);
Route::post("/todos/tick/{id}", [TodoController::class, "tick"]);


