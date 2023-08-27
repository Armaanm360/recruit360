<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicals', function (Blueprint $table) {
            $table->increments('medical_id');
            $table->string('medical_name');
            $table->string('medical_phone')->nullable();
            $table->string('medical_remarks')->nullable();
            $table->bigInteger('medical_cost_amount')->nullable();
            $table->string('medical_status')->nullable();
            $table->bigInteger('medical_created_by')->nullable();
            $table->bigInteger('medical_has_deleted')->nullable();
            $table->string('medical_create_date')->nullable();
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
        Schema::dropIfExists('medicals');
    }
}
