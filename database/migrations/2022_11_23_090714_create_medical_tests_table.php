<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_tests', function (Blueprint $table) {
            $table->increments('medical_test_id');
            $table->bigInteger('medical_test_medical_id');
            $table->bigInteger('medical_test_client_id');
            $table->string('medical_test_client_status');
            $table->bigInteger('medical_test_processing_cost');
            $table->bigInteger('medical_test_created_by')->nullable();
            $table->bigInteger('medical_test_has_deleted')->nullable();
            $table->string('medical_test_updated');
            $table->string('medical_test_create_date');
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
        Schema::dropIfExists('medical_tests');
    }
}