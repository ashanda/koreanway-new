<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function login(Request $request){
     return view('admin.auth.login');
    }    
}
