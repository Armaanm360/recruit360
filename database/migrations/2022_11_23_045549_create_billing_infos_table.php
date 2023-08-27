<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_infos', function (Blueprint $table) {
            $table->increments('billing_id');
            $table->bigInteger('billing_invoice_id')->nullable();
            $table->bigInteger('billing_product_id')->nullable();
            $table->bigInteger('billing_vendor')->nullable();
            $table->bigInteger('billing_quantity')->nullable();
            $table->bigInteger('billing_unit_price')->nullable();
            $table->bigInteger('billing_subtotal')->nullable();
            $table->string('billing_status')->nullable();
            $table->string('billing_date')->nullable();
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
        Schema::dropIfExists('billing_infos');
    }
}
