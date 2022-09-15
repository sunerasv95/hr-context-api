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
        Schema::create('c3_people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('dob');
            $table->char('gender');
            $table->double('basic_salary', 18,2);
            $table->string('mobile_no');
            $table->tinyInteger('active');
            $table->timestamps();
        });

        Schema::create('c3_employees', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->date('joined_date');
            $table->tinyInteger('active');
            $table->timestamps();
        });

        Schema::create('c3_managers', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->date('joined_date');
            $table->tinyInteger('active');
            $table->timestamps();
        });

        Schema::create('c3_companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_description');
            $table->string('company_logo');
            $table->date('established_date'); 
            $table->tinyInteger('active');
            $table->timestamps();
        });

        Schema::create('c3_locations', function (Blueprint $table) {
            $table->id();
            $table->string('location_name');
            $table->tinyInteger('active');
            $table->timestamps();
        });

        Schema::create('c3_assets', function (Blueprint $table) {
            $table->id();
            $table->string('asset_type');
            $table->string('description');
            $table->double('amount');
            $table->tinyInteger('active');
            $table->timestamps();
        });

        Schema::create('c3_company_groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_name');
            $table->string('description');
            $table->tinyInteger('is_parent');
            $table->tinyInteger('active');
            $table->timestamps();
        });

        //Relations
        Schema::table('c3_people', function (Blueprint $table) {
            $table->string('occupation_type');
            $table->integer('occupation_id');
        });

        Schema::table('c3_managers', function (Blueprint $table) {
            $table->foreignId('campany_id')->references('id')->on('c3_companies');
        });
        
        Schema::table('c3_employees', function (Blueprint $table) {
            $table->foreignId('campany_id')->references('id')->on('c3_companies');
            $table->foreignId('campany_group_id')->references('id')->on('c3_company_groups');
        });

        Schema::table('c3_assets', function (Blueprint $table) {
            $table->foreignId('campany_id')->references('id')->on('c3_companies');
        });

        Schema::table('c3_locations', function (Blueprint $table) {
            $table->foreignId('campany_id')->references('id')->on('c3_companies');
        });

        Schema::table('c3_company_groups', function (Blueprint $table) {
            $table->foreignId('parent_id')->references('id')->on('c3_company_groups');
            $table->foreignId('campany_id')->references('id')->on('c3_companies');
            $table->foreignId('group_head_id')->references('id')->on('c3_employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('c3_managers', function (Blueprint $table) {
            $table->dropForeign('c3_managers_campany_id_foreign');
        });

        Schema::table('c3_employees', function (Blueprint $table) {
            $table->dropForeign('c3_employees_campany_id_foreign');
            $table->dropForeign('c3_employees_campany_group_id_foreign');
        });

        Schema::table('c3_assets', function (Blueprint $table) {
            $table->dropForeign('c3_assets_campany_id_foreign');
        });

        Schema::table('c3_locations', function (Blueprint $table) {
            $table->dropForeign('c3_locations_campany_id_foreign');
        });

        Schema::table('c3_company_groups', function (Blueprint $table) {
            $table->dropForeign('c3_company_groups_parent_id_foreign');
            $table->dropForeign('c3_company_groups_campany_id_foreign');
            $table->dropForeign('c3_company_groups_group_head_id_foreign');
        });


        Schema::dropIfExists('c3_people');

        Schema::dropIfExists('c3_employees');

        Schema::dropIfExists('c3_managers');

        Schema::dropIfExists('c3_companies');

        Schema::dropIfExists('c3_locations');

        Schema::dropIfExists('c3_assets');

        Schema::dropIfExists('c3_company_groups');
    }
};
