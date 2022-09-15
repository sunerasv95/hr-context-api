<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('c1_employees')->insert([
            "employee_name" => "John",
            "employee_code" => 1001,
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('c1_employees')->insert([
            "employee_name" => "Sam",
            "employee_code" => 1002,
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('c1_employees')->insert([
            "employee_name" => "Anne",
            "employee_code" => 1003,
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('c1_employees')->insert([
            "employee_name" => "Rochelle",
            "employee_code" => 1004,
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('c1_employees')->insert([
            "employee_name" => "Diana",
            "employee_code" => 1005,
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
