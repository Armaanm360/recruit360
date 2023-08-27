<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeligateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deligate_transactions', function (Blueprint $table) {
            $table->increments('deligate_transaction_id');
            $table->string('deligate_transaction_type')->nullable();
            $table->bigInteger('deligate_transaction_account_id')->nullable();
            $table->bigInteger('deligate_transaction_client_id')->nullable();
            $table->string('deligate_transaction_amount')->nullable();
            $table->string('deligate_transaction_last_balance')->nullable();
            $table->bigInteger('deligate_transaction_opening_balance')->nullable();
            $table->string('deligate_transaction_date')->nullable();
            $table->string('deligate_transaction_note')->nullable();
            $table->string('deligate_account_create_date')->nullable();
            $table->string('deligate_account_has_deleted')->default('NO');
            $table->string('deligate_account_deleted_by')->nullable();
            $table->string('deligate_account_created_by')->nullable();
            $table->string('deligate_account_updated_by')->nullable();
            $table->string('deligate_account_status')->default(1);
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
        Schema::dropIfExists('deligate_transactions');
    }
}
