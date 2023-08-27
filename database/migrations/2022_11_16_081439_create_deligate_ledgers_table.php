<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeligateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deligate_ledgers', function (Blueprint $table) {
            $table->increments('deligate_ledger_id');
            $table->bigInteger('deligate_id')->nullable();
            $table->bigInteger('deligate_account_id')->nullable();
            $table->bigInteger('deligate_transaction_id')->nullable();
            $table->string('deligate_ledger_type')->nullable();
            $table->bigInteger('deligate_ledger_invoice_id')->nullable();
            $table->bigInteger('deligate_ledger_money_receipt_id')->nullable();
            $table->bigInteger('deligate_ledger_refund_id')->nullable();
            $table->string('deligate_ledger_status')->default(1);
            $table->bigInteger('deligate_ledger_last_balance')->nullable();
            $table->bigInteger('deligate_ledger_dr')->nullable();
            $table->bigInteger('deligate_ledger_cr')->nullable();
            $table->string('deligate_ledger_date')->nullable();
            $table->string('deligate_ledger_create_date')->nullable();
            $table->string('deligate_ledger_prepared_by')->nullable();
            $table->string('deligate_ledger_updated_by')->nullable();
            $table->string('deligate_ledger_deleted_by')->nullable();
            $table->string('deligate_ledger_is_deleted')->default('NO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deligate_ledgers');
    }
}
