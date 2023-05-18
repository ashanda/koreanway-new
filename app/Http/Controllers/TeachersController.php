<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function login(Request $request){
        return view('teacher.auth.login');
       } 

       
}
