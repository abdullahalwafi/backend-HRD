<?php

namespace Database\Seeders;

use App\Models\Employees;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employees::create([
            "name" => "Abdullah Al Wafi",
            "gender" => "pria",
            "phone" => "08558883118",
            "address" => "bgor",
            "email" => "abdullahalwafi16@gmail.com",
            "departement_id" => "1",
            "position_id" => "1",
            "status" => "active",
            "hired_on" => "2023-01-01"
        ]);

        Employees::create([
            "name" => "Lia OKta",
            "gender" => "pria",
            "phone" => "08558883118",
            "address" => "bgor",
            "email" => "liaokta@gmail.com",
            "departement_id" => "1",
            "position_id" => "1",
            "status" => "inactive",
            "hired_on" => "2023-01-01"
        ]);
        Employees::create([
            "name" => "Faisal",
            "gender" => "pria",
            "phone" => "08558883118",
            "address" => "bgor",
            "email" => "faisal@gmail.com",
            "departement_id" => "1",
            "position_id" => "1",
            "status" => "terminated",
            "hired_on" => "2023-01-01"
        ]);
    }
}
