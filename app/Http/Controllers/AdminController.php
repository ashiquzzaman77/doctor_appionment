<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Admin Dashboard
    public function AdminDashboard()
    {
        return view('admin.layouts.app');
    }
}
