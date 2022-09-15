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
        Schema::table('attendence_faults', function (Blueprint $table) {
            $table->dropForeign('attendence_faults_employee_id_foreign');
            $table->dropForeign('attendence_faults_attendence_id_foreign');
        });
    }
};
