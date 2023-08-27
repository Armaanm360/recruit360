<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliceClearancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('police_clearances', function (Blueprint $table) {
            
            $table->increments('police_clearance_id');
            $table->bigInteger('police_clearance_client_id');
            $table->string('police_clearance_status');
            $table->string('police_clearance_file');
            $table->bigInteger('police_clearance_created_by')->nullable();
            $table->string('police_clearance_has_deleted')->nullable()->default("NO");
            $table->string('police_clearance_updated');
            $table->string('police_clearance_create_date');
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
        Schema::dropIfExists('police_clearances');
    }
}