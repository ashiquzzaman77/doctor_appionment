<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Admin Dashboard
    public function AdminDashboard()
    {
        $appointments = Appointment::with('doctor')->get();
        $doctors = Doctor::latest()->get();
        $departments = Department::latest()->get();
        return view('admin.layouts.app',compact('appointments','doctors','departments'));
    }

    //appointment
    public function appointment()
    {
        return view('admin.pages.appointment');
    }
}
