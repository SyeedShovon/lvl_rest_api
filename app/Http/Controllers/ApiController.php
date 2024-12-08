<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends BaseController
{
    function index(){
        $total = $this->twoRouteCheck();
        return ["msg"=>"Total from API $total"];
    }
}
