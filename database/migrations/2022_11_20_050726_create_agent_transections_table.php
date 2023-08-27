<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentTransectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_transections', function (Blueprint $table) {
            $table->increments('agent_transaction_id');
            $table->string('agent_transaction_type')->nullable();
            $table->bigInteger('agent_transaction_account_id')->nullable();
            $table->bigInteger('agent_transaction_client_id')->nullable();
            $table->string('agent_transaction_amount')->nullable();
            $table->string('agent_transaction_last_balance')->nullable();
            $table->bigInteger('agent_transaction_opening_balance')->nullable();
            $table->string('agent_transaction_date')->nullable();
            $table->string('agent_transaction_note')->nullable();
            $table->string('agent_account_create_date')->nullable();
            $table->string('agent_account_has_deleted')->default('NO');
            $table->string('agent_account_deleted_by');
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
        Schema::dropIfExists('agent_transections');
    }
}
