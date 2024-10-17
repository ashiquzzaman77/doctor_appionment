<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Admin Dashboard
    public function AdminDashboard()
    {
        $appointments = Appointment::with('doctor')->get();
        return view('admin.layouts.app',compact('appointments'));
    }

    //appointment
    public function appointment()
    {
        return view('admin.pages.appointment');
    }
}
