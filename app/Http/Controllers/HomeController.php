<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function userDashboard()
    {
        return view('user_dashboard');
    }

    public function writerDashboard()
    {
        return view('Writer-dashboard.Dashboard.dashboard');
    }
    public function AdminDashboard()
    {
        return view('Admin_dashboard');
    }
} 
