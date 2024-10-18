<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::latest()->get();
        return view('admin.pages.doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::latest()->get();
        return view('admin.pages.doctor.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'fee' => 'required|numeric',
            'date.*' => 'required',
        ]);

        // Create a new doctor
        Doctor::create([
            'department_id' => $request->department_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'fee' => $request->fee,
            'date' => json_encode($request->date)
        ]);

        // Redirect with a success message
        return redirect()->route('admin.doctor.index')->with('success', 'Doctor created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctor = Doctor::findOrFail($id);
        $departments = Department::latest()->get();

        $selectedDates = $doctor->date ? json_decode($doctor->date) : [];

        // dd($doctor, $departments, $selectedDates);

        return view('admin.pages.doctor.edit', compact('departments', 'doctor','selectedDates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the doctor by ID
        $doctor = Doctor::findOrFail($id);

        // Validate the incoming request
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'fee' => 'required|numeric',
            'date.*' => 'required',
        ]);

        // Update the doctor information
        $doctor->update([
            'department_id' => $request->department_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'fee' => $request->fee,
            'date' => json_encode($request->date)
        ]);

        // Redirect with a success message
        return redirect()->route('admin.doctor.index')->with('success', 'Doctor updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the doctor by ID
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        // Redirect with a success message
        return redirect()->back()->with('success', 'Doctor deleted successfully!');
    }
}
