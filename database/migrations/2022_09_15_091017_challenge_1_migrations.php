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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name');
            $table->timestamps();
        });

        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->date('scheduled_date');
            $table->timestamps();
        });

        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->time('start_at');
            $table->time('finished_at');
            $table->timestamps();
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('location_name');
            $table->timestamps();
        });

        Schema::create('attendences', function (Blueprint $table) {
            $table->id();
            $table->date('checked_date');
            $table->time('checked_time');
            $table->tinyInteger('is_checkin')->default(1);
            $table->timestamps();
        });

        Schema::create('attendence_faults', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::table('schedules', function (Blueprint $table) {
            $table->foreignId('employee_id')->references('id')->on('employees');
            $table->foreignId('location_id')->references('id')->on('locations');
            $table->foreignId('shift_id')->references('id')->on('shifts');
        });

        Schema::table('attendence_faults', function (Blueprint $table) {
            $table->foreignId('employee_id')->references('id')->on('employees');
            $table->foreignId('attendence_id')->references('id')->on('attendences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');

        Schema::dropIfExists('schedules');

        Schema::dropIfExists('shifts');

        Schema::dropIfExists('locations');

        Schema::dropIfExists('attendences');

        Schema::dropIfExists('attendence_faults');

        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign('schedules_employee_id_foreign');
            $table->dropForeign('schedules_location_id_foreign');
            $table->dropForeign('schedules_shift_id_foreign');
        });

        Schema::table('attendence_faults', function (Blueprint $table) {
            $table->dropForeign('attendence_faults_employee_id_foreign');
            $table->dropForeign('attendence_faults_attendence_id_foreign');
        });
    }
};
