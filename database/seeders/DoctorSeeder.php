<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('doctors')->insert([
            
            [
                'department_id' => '1',
                'name' => 'Dr. Rahim Khan',
                'phone' => '01725652578',
                'fee' => 1600,
                'phone' => '123-456-7890',
                'date' => '2024-10-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => '2',
                'name' => 'Dr. John Doe',
                'phone' => '01725652578',
                'fee' => 1800,
                'phone' => '123-456-7890',
                'date' => '2024-10-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more doctors as needed
            [
                'department_id' => '3',
                'name' => 'Dr. Ashiquzzaman',
                'phone' => '01782569874',
                'fee' => 1200,
                'phone' => '123-456-7890',
                'date' => '2024-10-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => '4',
                'name' => 'Dr. Asraf',
                'phone' => '01782569874',
                'fee' => 10000,
                'phone' => '123-456-7890',
                'date' => '2024-10-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => '5',
                'name' => 'Dr. Rayhen',
                'phone' => '01782569874',
                'fee' => 1500,
                'phone' => '123-456-7890',
                'date' => '2024-10-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => '6',
                'name' => 'Dr. Ibrahim',
                'phone' => '01782569874',
                'fee' => 800,
                'phone' => '123-456-7890',
                'date' => '2024-10-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
