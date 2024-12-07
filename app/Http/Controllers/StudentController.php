<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function list(){
        return Students::all();
    }

    function addStudent(Request $req){
        $student = new Students();
        $student->name = $req->name;
        $student->email = $req->email;
        if($student->save()){
            return ["Student"=>"Added successfully"];
        }else{
            return ["Student"=>"Unsuccessfull"];
        }
    }
}
