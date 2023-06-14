<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonalCenterController extends Controller
{
    public function index(){
        
        
        return view('personal_center.index');
    }
}
