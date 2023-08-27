<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_ledgers', function (Blueprint $table) {
            $table->increments('agent_ledger_id');
            $table->bigInteger('agent_id')->nullable();
            $table->bigInteger('agent_account_id')->nullable();
            $table->bigInteger('agent_transaction_id')->nullable();
            $table->string('agent_ledger_type')->nullable();
            $table->bigInteger('agent_ledger_invoice_id')->nullable();
            $table->bigInteger('agent_ledger_money_receipt_id')->nullable();
            $table->bigInteger('agent_ledger_refund_id')->nullable();
            $table->string('agent_ledger_status')->nullable();
            $table->bigInteger('agent_ledger_last_balance')->nullable();
            $table->bigInteger('agent_ledger_dr')->nullable();
            $table->bigInteger('agent_ledger_cr')->nullable();
            $table->string('agent_ledger_date')->nullable();
            $table->string('agent_ledger_create_date')->nullable();
            $table->string('agent_ledger_prepared_by')->nullable();
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
        Schema::dropIfExists('agent_ledgers');
    }
}
