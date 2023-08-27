<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsor_transactions', function (Blueprint $table) {
            $table->increments('sponsor_transaction_id');
            $table->string('sponsor_transaction_type')->nullable();
            $table->bigInteger('sponsor_transaction_account_id')->nullable();
            $table->bigInteger('sponsor_transaction_client_id')->nullable();
            $table->string('sponsor_transaction_amount')->nullable();
            $table->string('sponsor_transaction_last_balance')->nullable();
            $table->bigInteger('sponsor_transaction_opening_balance')->nullable();
            $table->string('sponsor_transaction_date')->nullable();
            $table->string('sponsor_transaction_note')->nullable();
            $table->string('sponsor_account_create_date')->nullable();
            $table->string('sponsor_account_has_deleted')->default('NO');
            $table->string('sponsor_account_deleted_by')->nullable();
            $table->string('sponsor_account_created_by')->nullable();
            $table->string('sponsor_account_updated_by')->nullable();
            $table->string('sponsor_account_status')->default(1);
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
        Schema::dropIfExists('sponsor_transactions');
    }
}
