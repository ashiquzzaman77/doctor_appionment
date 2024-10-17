<?php
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

//Doctor
Route::get('/', [HomePageController::class, 'index'])->name('homepage');
Route::get('/doctor', [HomePageController::class, 'doctor'])->name('doctor');

//Appointment
Route::get('/appointment', [HomePageController::class, 'appointment'])->name('appointment');
Route::post('/appointment/doctor', [HomePageController::class, 'appointmentDoctor'])->name('appointment.doctor');
Route::get('/doctor/fee/{doctorId}', [HomePageController::class, 'getDoctorFee'])->name('doctor.fee');

