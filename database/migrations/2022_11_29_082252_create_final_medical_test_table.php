<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalMedicalTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_medical_test', function (Blueprint $table) {
            $table->increments('final_medical_test_id');
            $table->bigInteger('final_medical_test_medical_id');
            $table->bigInteger('final_medical_test_client_id');
            $table->string('final_medical_test_client_status');
            $table->bigInteger('final_medical_test_processing_cost');
            $table->bigInteger('final_medical_test_created_by')->nullable();
            $table->string('final_medical_test_has_deleted')->nullable()->default("NO");
            $table->string('final_medical_test_updated');
            $table->string('final_medical_test_create_date');
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
        Schema::dropIfExists('final_medical_test');
    }
}