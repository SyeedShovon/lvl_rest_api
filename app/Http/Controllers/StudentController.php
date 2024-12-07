<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    function list()
    {
        return Students::all();
    }

    function addStudent(Request $req)
    {
        $rules = array(
            'name' => 'required | min:2 | max:10',
            'email' => 'required | email'
        );
        $validation = Validator::make($req->all(), $rules);
        if ($validation->fails()) {
            return $validation->errors();
        } else {
            $student = new Students();
            $student->name = $req->name;
            $student->email = $req->email;
            if ($student->save()) {
                return ["Student" => "Added successfully"];
            } else {
                return ["Student" => "Unsuccessfull"];
            }
        }
    }

    function updateStudent(Request $req)
    {
        $rules = [
            'name' => 'required | min:2 | max:10',
            'email' => 'required | email',
            'id' => 'required'
        ];
        $validation = Validator::make($req->all(), $rules);
        if ($validation->fails()) {
            return $validation->errors();
        } else {
            $student = Students::find($req->id);
            if(empty($student)){
                return ["student"=>"Not found"];
            }
            $student->name = $req->name;
            $student->email = $req->email;
            if ($student->save()) {
                return ["student" => "Updated successfully"];
            } else {
                return ["student" => "Unsuccessfull"];
            }
        }
    }

    function searchStudent($name)
    {
        $student = Students::where('name', 'like', "%$name%")->get();
        if (count($student) == 0) {
            return ["student" => "Not found"];
        } else {
            return ["result" => $student];
        }
    }

    function deleteStudent($id)
    {
        $student = Students::destroy($id);
        if ($student) {
            return ["student" => "Record deleted"];
        } else {
            return ["student" => "Record not found"];
        }
    }
}
