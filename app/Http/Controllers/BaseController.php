<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function twoRouteCheck(){
        $first = 1;
        $second = 2;
        $final = $first+$second;
        return $final;
    }
}
