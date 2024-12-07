<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/test', function(){
    return ['name'=>'Shovon','Designation'=>'BB AD ICT'];
});

Route::get('students',[StudentController::class,'list']);
Route::post('add-student',[StudentController::class,'addStudent']);
Route::put('update-student',[StudentController::class,'updateStudent']);
Route::get('search/{name}',[StudentController::class,'searchStudent']);
Route::delete('delete/{id}',[StudentController::class,'deleteStudent']);

Route::resource('member',MemberController::class);