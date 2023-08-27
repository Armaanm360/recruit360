<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->increments('refund_id');
            $table->bigInteger('refund_invoice_id')->nullable();
            $table->bigInteger('refund_client_id')->nullable();
            $table->bigInteger('refund_client_transaction_id')->nullable();
            $table->bigInteger('refund_agent_id')->nullable();
            $table->bigInteger('refund_agent_transaction_id')->nullable();
            $table->bigInteger('refund_deligate_id')->nullable();
            $table->bigInteger('refund_deligate_transaction_id')->nullable();
            $table->bigInteger('refund_sponsor_id')->nullable();
            $table->bigInteger('refund_sponsor_transaction_id')->nullable();
            $table->bigInteger('refund_quantity')->nullable();
            $table->bigInteger('refund_charge')->nullable();
            $table->bigInteger('refund_return_price')->nullable();
            $table->bigInteger('refund_note')->nullable();
            $table->bigInteger('refund_status')->nullable();
            $table->string('_refund_date')->nullable();
            $table->string('_refund_note')->nullable();
            $table->string('_refund_create_date')->nullable();
            $table->string('_refund_has_deleted')->default('NO');
            $table->string('_refund_deleted_by')->nullable();
            $table->string('_refund_created_by')->nullable();
            $table->string('_refund_updated_by')->nullable();
            $table->string('_refund_status')->default(1);
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
        Schema::dropIfExists('refunds');
    }
}
