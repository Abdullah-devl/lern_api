<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/task',[TaskController::class,'index']);
// Route::get('/task',[TaskController::class,'store']);
// Route::get('/task/{id}',[TaskController::class,'update']);
// Route::get('/task/{id}',[TaskController::class,'show']);
// Route::get('/task/{id}',[TaskController::class,'destroy']);
//هذا الراوت يغطي كل عمليات  الاضافه والمسح والتعديل والعرض كلها  تبع لارفيل هو
Route::apiResource('tasks',TaskController::class);


// Route::get('/profile',[ProfileController::class,'index']);
Route::get('/profile',[ProfileController::class,'store']);
// Route::get('/profile/{id}',[ProfileController::class,'update']);
Route::get('/profile/{id}',[ProfileController::class,'show']);
// Route::get('/profile/{id}',[ProfileController::class,'destroy']);

Route::get('/user/{id}/profile',[UserController::class,'getUserProfile']);


Route::get('/user/{id}/tasks',[UserController::class,'getUserTasks']);


Route::get('/task/{id}/user',[TaskController::class,'getTaskUser']);
