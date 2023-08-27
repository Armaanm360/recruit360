<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('client_id');
            $table->string('client_entry_id')->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_phone')->nullable();
            $table->string('client_email')->nullable();
            $table->bigInteger('client_nid')->nullable();
            $table->string('client_picture')->nullable();
            $table->string('musaned')->nullable();
            $table->string('musaned_number')->nullable();
            $table->string('musaned_date')->nullable();
            $table->string('musaned_file')->nullable();
            $table->string('exp_tc')->nullable();
            $table->string('mofa')->nullable();
            $table->string('e_chek')->nullable();
            $table->bigInteger('client_status')->nullable();
            $table->string('client_create_date')->nullable();
            $table->string('client_has_deleted')->default('NO');
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
        Schema::dropIfExists('clients');
    }
}
