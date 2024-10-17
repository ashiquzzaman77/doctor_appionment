<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Insert 10 departments
         Department::create(['name' => 'Child Specialist']);
         Department::create(['name' => 'Cardiology']);
         Department::create(['name' => 'Neurology']);
         Department::create(['name' => 'Orthopedics']);
         Department::create(['name' => 'Dermatology']);
         Department::create(['name' => 'Pediatrics']);
         Department::create(['name' => 'Gynecology']);
         Department::create(['name' => 'Oncology']);
         Department::create(['name' => 'Psychiatry']);
         Department::create(['name' => 'Radiology']);
    }
}
