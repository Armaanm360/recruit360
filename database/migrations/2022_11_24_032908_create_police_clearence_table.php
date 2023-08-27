<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliceClearenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('police_clearence', function (Blueprint $table) {
            $table->increments('police_clearence_id');
            $table->bigInteger('police_clearence_client_id')->nullable();
            $table->string('police_clearence_result');
            $table->string('police_clearence_deleted')->default('NO');
            $table->bigInteger('police_clearence_deleted_by')->nullable();
            $table->bigInteger('police_clearence_created_by')->nullable();
            $table->bigInteger('police_clearence_updated_by')->nullable();
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
        Schema::dropIfExists('police_clearence');
    }
}
