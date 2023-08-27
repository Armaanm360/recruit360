<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTrasectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_trasections', function (Blueprint $table) {
            $table->increments('transaction_id');
            $table->string('transaction_type')->nullable();
            $table->bigInteger('transaction_account_id')->nullable();
            $table->bigInteger('transaction_client_id')->nullable();
            $table->string('transaction_amount')->nullable();
            $table->string('transaction_last_balance')->nullable();
            $table->bigInteger('transaction_opening_balance')->nullable();
            $table->string('transaction_date')->nullable();
            $table->string('transaction_note')->nullable();
            $table->string('account_create_date')->nullable();
            $table->string('account_has_deleted')->default('NO');
            $table->string('account_deleted_by');
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
        Schema::dropIfExists('account_trasections');
    }
}
