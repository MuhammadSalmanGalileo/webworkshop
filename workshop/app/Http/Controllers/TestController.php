<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;

class TestController extends Controller
{
    public function showLog(){
        return Log::all(); 
    }
}
