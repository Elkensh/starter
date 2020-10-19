<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecondController extends Controller
{
    //4
    public function __construct(){
        $this->middleware('auth')->except('showSecond3');
    }

    public function showSecond0(){

        return 'second0 controller done';
    }
    public function showSecond1(){

        return 'second1 controller done';
    }
    public function showSecond2(){

        return 'second2 controller done';
    }
    public function showSecond3(){

        return 'second3 controller done';
    }
}
