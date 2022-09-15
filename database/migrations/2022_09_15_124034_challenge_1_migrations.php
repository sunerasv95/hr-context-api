<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c1_employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name');
            $table->timestamps();
        });

        Schema::create('c1_schedules', function (Blueprint $table) {
            $table->id();
            $table->date('scheduled_date');
            $table->timestamps();
        });

        Schema::create('c1_shifts', function (Blueprint $table) {
            $table->id();
            $table->time('start_at');
            $table->time('finished_at');
            $table->timestamps();
        });

        Schema::create('c1_locations', function (Blueprint $table) {
            $table->id();
            $table->string('location_name');
            $table->timestamps();
        });

        Schema::create('c1_attendences', function (Blueprint $table) {
            $table->id();
            $table->date('checked_date');
            $table->time('checked_time');
            $table->tinyInteger('is_checkin')->default(1);
            $table->timestamps();
        });

        Schema::create('c1_attendence_faults', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::table('c1_schedules', function (Blueprint $table) {
            $table->foreignId('employee_id')->references('id')->on('c1_employees');
            $table->foreignId('location_id')->references('id')->on('c1_locations');
            $table->foreignId('shift_id')->references('id')->on('c1_shifts');
        });

        Schema::table('c1_attendence_faults', function (Blueprint $table) {
            $table->foreignId('employee_id')->references('id')->on('c1_employees');
            $table->foreignId('attendence_id')->references('id')->on('c1_attendences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('c1_schedules', function (Blueprint $table) {
            $table->dropForeign('c1_schedules_employee_id_foreign');
            $table->dropForeign('c1_schedules_location_id_foreign');
            $table->dropForeign('c1_schedules_shift_id_foreign');
        });

        Schema::table('c1_attendence_faults', function (Blueprint $table) {
            $table->dropForeign('c1_attendence_faults_employee_id_foreign');
            $table->dropForeign('c1_attendence_faults_attendence_id_foreign');
        });

        Schema::dropIfExists('c1_employees');

        Schema::dropIfExists('c1_schedules');

        Schema::dropIfExists('c1_shifts');

        Schema::dropIfExists('c1_locations');

        Schema::dropIfExists('c1_attendences');

        Schema::dropIfExists('c1_attendence_faults');
    }
};
