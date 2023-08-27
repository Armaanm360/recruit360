<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientOverAllsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_over_alls', function (Blueprint $table) {
            $table->increments('client_overall_id');
            $table->string('client_id')->nullable();
            $table->string('mofa_number')->nullable();
            $table->string('mofa_file')->nullable();
            $table->string('fingur_status')->nullable();
            $table->string('fingur_file')->nullable();
            $table->string('bank_statement_status')->nullable();
            $table->string('bank_statement_file')->nullable();
            $table->string('bmet_status')->nullable();
            $table->string('bmet_file')->nullable();
            $table->string('flight_airline')->nullable();
            $table->string('flight_date')->nullable();
            $table->string('flight_number')->nullable();
            $table->string('flight_ticket_number')->nullable();
            $table->string('flight_file')->nullable();
            $table->bigInteger('client_over_alls_created_by')->nullable();
            $table->string('client_over_alls_has_deleted')->nullable()->default("NO");
            $table->string('client_over_alls_updated_by')->nullable();
            $table->string('client_over_alls_deleted_by')->nullable();
            $table->string('client_over_alls_create_date')->nullable();
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
        Schema::dropIfExists('client_over_alls');
    }
}
