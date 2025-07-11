<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    
    public function list(){

        return view('admin.admin.list');
    }

     public function add(){

        return view('admin.admin.add');
    }
}
