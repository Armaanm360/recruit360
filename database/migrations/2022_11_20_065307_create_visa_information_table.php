<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisaInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa_information', function (Blueprint $table) {
            $table->increments('visa_id')->primary();

            $table->bigInteger('visa_no');
            $table->string('visa_issue_date');
            $table->string('visa_job_type')->nullable();
            $table->string('visa_gender_type');
            $table->bigInteger('visa_amount');

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visa_information');
    }
}