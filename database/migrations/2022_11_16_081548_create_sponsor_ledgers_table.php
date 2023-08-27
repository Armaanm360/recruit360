<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsor_ledgers', function (Blueprint $table) {
            $table->increments('sponsor_ledger_id');
            $table->bigInteger('sponsor_id')->nullable();
            $table->bigInteger('sponsor_account_id')->nullable();
            $table->bigInteger('sponsor_transaction_id')->nullable();
            $table->string('sponsor_ledger_type')->nullable();
            $table->bigInteger('sponsor_ledger_invoice_id')->nullable();
            $table->bigInteger('sponsor_ledger_money_receipt_id')->nullable();
            $table->bigInteger('sponsor_ledger_refund_id')->nullable();
            $table->string('sponsor_ledger_status')->nullable();
            $table->bigInteger('sponsor_ledger_last_balance')->nullable();
            $table->bigInteger('sponsor_ledger_dr')->nullable();
            $table->bigInteger('sponsor_ledger_cr')->nullable();
            $table->string('sponsor_ledger_date')->nullable();
            $table->string('sponsor_ledger_create_date')->nullable();
            $table->string('sponsor_ledger_prepared_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsor_ledgers');
    }
}
