<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneyRecieptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('money_reciept', function (Blueprint $table) {
            $table->increments('money_reciept_id');
            $table->bigInteger('money_reciept_account_transaction_id')->nullable();
            $table->string('money_reciept_voucher_no')->nullable();
            $table->bigInteger('money_reciept_client_id')->nullable();
            $table->bigInteger('money_reciept_client_transaction_id')->nullable();
            $table->bigInteger('money_reciept_agent_id')->nullable();
            $table->bigInteger('money_reciept_agent_transaction_id')->nullable();
            $table->bigInteger('money_reciept_deligate_id')->nullable();
            $table->bigInteger('money_reciept_deligate_transaction_id')->nullable();
            $table->bigInteger('money_reciept_sponsor_id')->nullable();
            $table->bigInteger('money_reciept_sponsor_transaction_id')->nullable();
            $table->string('money_reciept_payment_to')->nullable();
            $table->bigInteger('money_reciept_total_amount')->nullable();
            $table->bigInteger('money_reciept_total_discount')->nullable();
            $table->string('money_reciept_payment_type')->nullable();
            $table->string('money_reciept_payment_date')->nullable();
            $table->string('money_reciept_note')->nullable();
            $table->string('money_reciept_payment_status')->nullable();
            $table->string('money_reciept_has_deleted')->default('NO');
            $table->bigInteger('money_reciept_deleted_by')->nullable();
            $table->bigInteger('money_reciept_created_by')->nullable();
            $table->bigInteger('money_reciept_updated_by')->nullable();
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
        Schema::dropIfExists('money_reciept');
    }
}
