<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refund_items', function (Blueprint $table) {
            $table->increments('refund_item_id');
            $table->bigInteger('refund_product_id');
            $table->bigInteger('refund_invoice_quantity');
            $table->bigInteger('refund_remaining_quantity');
            $table->bigInteger('refund_quantity');
            $table->bigInteger('refund_charge');
            $table->bigInteger('refund_unit_price');
            $table->bigInteger('refund_single_product_total_price');
            $table->bigInteger('refund_amount');
            $table->bigInteger('refund_return_price');
            $table->bigInteger('refund_total');
            $table->bigInteger('refund_net_charge_total');
            $table->bigInteger('refund_total_price');
            $table->bigInteger('refund_item_created_by')->nullable();
            $table->string('refund_item_create_date');
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
        Schema::dropIfExists('refund_items');
    }
}
