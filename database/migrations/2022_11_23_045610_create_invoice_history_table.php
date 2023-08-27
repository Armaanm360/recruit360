<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_history', function (Blueprint $table) {
            $table->increments('history_id');
            $table->string('history_type')->nullable();
            $table->bigInteger('history_invoice_id')->nullable();
            $table->string('history_date')->nullable();
            $table->string('history_create_date')->nullable();
            $table->bigInteger('history_created_by')->nullable();
            $table->bigInteger('history_updated_by')->nullable();
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
        Schema::dropIfExists('invoice_history');
    }
}
