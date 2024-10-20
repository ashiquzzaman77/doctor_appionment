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
// In routes/web.php
Route::get('/doctors-by-department/{departmentId}', [HomePageController::class, 'getDoctorsByDepartment'])->name('doctors.byDepartment');
Route::get('doctor/availability/{doctorId}/{date}', [HomePageController::class, 'checkAvailability']);



