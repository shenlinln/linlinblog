<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    //
    public function AdminMain(){
        
        return view('admin.main.main');
    }
}
