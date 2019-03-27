<?php

namespace App\Http\Controllers;
// 'use' imports functions into this namespace.
use Illuminate\Http\Request;

class ConvertController extends Controller
{
   public function index()
    {
        return 'Show Converter page';
    }
    
    public function calculate($input1) 
    {
        return view('calculate.calculate')->with(['input1' => $input1]); //. $result; 
    }
}
