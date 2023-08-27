<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {


            $table->increments('sponsor_id');
            $table->string('sponsor_entry_id')->nullable();
            $table->string('sponsor_country_name')->nullable();
            $table->bigInteger('sponsor_country_id')->nullable();
            $table->string('sponsor_name')->nullable();
            $table->string('sponsor_phone')->nullable();
            $table->string('sponsor_email')->nullable();
            $table->bigInteger('sponsor_nid')->nullable();
            $table->string('sponsor_picture')->nullable();
            $table->bigInteger('sponsor_status')->nullable();
            $table->string('sponsor_licence_file')->nullable();
            $table->bigInteger('sponsor_licence_no')->nullable();
            $table->string('sponsor_create_date')->nullable();
            $table->string('sponsor_has_deleted')->default('NO');
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
        Schema::dropIfExists('sponsors');
    }
}
