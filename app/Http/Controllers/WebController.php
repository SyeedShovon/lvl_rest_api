<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends BaseController
{
    public function index(){
        $total = $this->twoRouteCheck();
        return "Total from web: $total";
    }
}
