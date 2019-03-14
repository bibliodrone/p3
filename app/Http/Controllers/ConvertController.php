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
    
    public function calculate($input[]) 
    {
        return 'Conversion calculation: ' //. $result; 
    }
}
