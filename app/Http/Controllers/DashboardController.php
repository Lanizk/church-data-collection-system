<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function showAdminDashboard()
    {
        return view('admin.dashboard'); 
    }

      public function showParishDashboard()
    {
        return view('admin.dashboard'); 
    }

      public function showAccountantDashboard()
    {
        return view('admin.dashboard'); 
    }
}
