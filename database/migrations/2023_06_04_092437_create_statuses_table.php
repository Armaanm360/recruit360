<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status_entry')->nullable();
            $table->string('status')->nullable();
            $table->string('status_for')->nullable();
            $table->bigInteger('status_created_by')->nullable();
            $table->string('status_has_deleted')->default("NO");
            $table->string('status_updated_by')->nullable();
            $table->string('status_deleted_by')->nullable();
            $table->string('status_create_date')->nullable();
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
        Schema::dropIfExists('statuses');
    }
}
