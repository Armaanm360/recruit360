<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('invoice_id');
            $table->bigInteger('invoice_no')->nullable();
            $table->bigInteger('invoice_client_id')->nullable();
            $table->bigInteger('invoice_agent_id')->nullable();
            $table->bigInteger('invoice_delegate_id')->nullable();
            $table->bigInteger('invoice_sponsor_id')->nullable();
            $table->bigInteger('invoice_sub_id')->nullable();
            $table->bigInteger('invoice_net_id')->nullable();
            $table->bigInteger('invoice_client_previous_balance')->nullable();
            $table->bigInteger('invoice_total_profit')->nullable();
            $table->bigInteger('invoice_total_cost')->nullable();
            $table->string('invoice_date')->nullable();
            $table->string('invoice_sales_date')->nullable();
            $table->string('invoice_note')->nullable();
            $table->string('invoice_has_deleted')->default('NO');
            $table->bigInteger('invoice_created_by')->nullable();
            $table->bigInteger('invoice_updated_by')->nullable();
            $table->bigInteger('invoice_deleted_by')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
