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
        Schema::table('schedules', function (Blueprint $table) {
            $table->foreignId('employee_id')->references('id')->on('employees');
            $table->foreignId('location_id')->references('id')->on('locations');
            $table->foreignId('shift_id')->references('id')->on('shifts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign('schedules_employee_id_foreign');
            $table->dropForeign('schedules_location_id_foreign');
            $table->dropForeign('schedules_shift_id_foreign');
        });
    }
};
