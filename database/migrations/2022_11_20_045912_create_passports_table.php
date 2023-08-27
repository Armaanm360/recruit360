<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passports', function (Blueprint $table) {
            $table->id();
            $table->string('passport_no')->nullable();
            $table->string('passport_name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('date_of_passport_issue')->nullable();
            $table->string('date_of_passport_expiry')->nullable();
            $table->string('duration_left')->nullable();
            $table->string('email')->nullable();
            $table->string('passport_reference')->nullable();
            $table->string('passport_amount')->nullable();
            $table->string('status')->nullable();
            $table->string('created_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->string('passport_creation_date')->nullable();
            $table->string('passport_document')->nullable();
            $table->string('passport_has_deleted')->nullable();
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
        Schema::dropIfExists('passports');
    }
}
