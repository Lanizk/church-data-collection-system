<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
     public function showAdminDashboard()
    {
        return view('admin.dashboard'); 
    }
}
