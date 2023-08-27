<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('agent_id');
            $table->string('agent_entry_id');
            $table->string('agent_name')->nullable();
            $table->bigInteger('agent_nid')->nullable();
            $table->bigInteger('agent_phone')->nullable();
            $table->string('agent_email')->nullable();
            $table->string('agent_address')->nullable();
            $table->string('agent_picture')->nullable();
            $table->bigInteger('agent_status')->nullable();
            $table->string('agent_has_deleted')->default('NO');
            $table->string('agent_create_date')->nullable();
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
        Schema::dropIfExists('agents');
    }
}