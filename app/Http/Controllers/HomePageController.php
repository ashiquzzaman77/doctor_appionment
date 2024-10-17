<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Department;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //doctor
    public function index()
    {
        return view('frontend.pages.index');
    }

    //doctor
    public function doctor()
    {
        $doctors = Doctor::latest('id')->get();
        return view('frontend.pages.doctor', compact('doctors'));
    }

    //appointment
    public function appointment()
    {
        $departments = Department::latest()->get();
        $doctors = Doctor::latest()->get();
        return view('frontend.pages.appointment', compact('doctors', 'departments'));
    }

    //getDoctorFee
    public function getDoctorFee($doctorId)
    {
        $doctor = Doctor::find($doctorId);
        return response()->json(['fee' => $doctor->fee]);
    }

    public function getDoctorsByDepartment($departmentId)
    {
        // Get doctors by department_id
        $doctors = Doctor::where('department_id', $departmentId)->get();
        return response()->json($doctors);
    }

    //appointmentDoctor
    public function appointmentDoctor(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'department_id' => 'required',
            'doctor_id' => 'required|exists:doctors,id',
            'patient_name' => 'required|string|max:255',
            'patient_phone' => 'required|regex:/^\+?\d{10,15}$/', // basic phone validation
            'total_fee' => 'nullable|numeric|min:0',
            'paid_amount' => 'nullable|numeric|min:0',
        ]);

        $lastAppointment = Appointment::orderBy('appointment_no', 'desc')->first();
        $nextAppointmentNo = $lastAppointment ? 'A-' . str_pad((int) substr($lastAppointment->appointment_no, 2) + 1, 3, '0', STR_PAD_LEFT) : 'A-001';

        // Create the new appointment in the database
        $appointment = new Appointment();

        $appointment->appointment_no = $nextAppointmentNo;

        $appointment->appointment_date = $validatedData['appointment_date'];
        $appointment->appointment_time = $validatedData['appointment_time'];
        $appointment->department_id = $validatedData['department_id'];
        $appointment->doctor_id = $validatedData['doctor_id'];
        $appointment->patient_name = $validatedData['patient_name'];
        $appointment->patient_phone = $validatedData['patient_phone'];
        $appointment->total_fee = $validatedData['total_fee'];
        $appointment->paid_amount = $validatedData['paid_amount'];
        $appointment->save();

        // Redirect or return success response
        return redirect()->back()->with('success', 'Appointment successfully booked!');
    }
}
