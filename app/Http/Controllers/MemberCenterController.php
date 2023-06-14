<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberCenterController extends Controller
{
    public function index(){
        
        
        return view('member_center.index');
    }
}
