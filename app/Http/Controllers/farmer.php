<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class farmer extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }

    public function farmers_table(){
        return view('farmers_table');
    }

}
