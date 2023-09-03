<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function foo(){
        return 'Bienvenue dans admin';
    }

    public function bar(){
        return 'Hello words';
    }
}