<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        DB::table('c1_schedules')->insert([
            "scheduled_date" => "2022/09/01",
            "employee_id" => 1,
            "location_id" => 1,
            "shift_id" => 1,
            "created_at" => now(),
            "updated_at" => now()
        ]);
         
        DB::table('c1_schedules')->insert([
            "scheduled_date" => "2022/09/02",
            "employee_id" => 1,
            "location_id" => 1,
            "shift_id" => 1,
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('c1_schedules')->insert([
            "scheduled_date" => "2022/09/03",
            "employee_id" => 1,
            "location_id" => 1,
            "shift_id" => 1,
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
