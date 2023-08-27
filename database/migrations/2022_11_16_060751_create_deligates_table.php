<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeligatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deligates', function (Blueprint $table) {
            $table->increments('deligate_id');
            $table->string('deligate_entry_id')->nullable();
            $table->string('deligate_country_name')->nullable();
            $table->bigInteger('deligate_country_id')->nullable();
            $table->string('deligate_name')->nullable();
            $table->string('deligate_phone')->nullable();
            $table->string('deligate_email')->nullable();
            $table->bigInteger('deligate_licence_no')->nullable();
            $table->string('deligate_licence_file')->nullable();
            $table->string('deligate_picture')->nullable();
            $table->bigInteger('deligate_status')->nullable();
            $table->string('deligate_create_date')->nullable();
            $table->string('deligate_has_deleted')->default('NO');
            $table->string('deligate_created_by')->nullable();
            $table->string('deligate_updated_by')->nullable();
            $table->string('deligate_deleted_by')->nullable();
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
        Schema::dropIfExists('deligates');
    }
}
