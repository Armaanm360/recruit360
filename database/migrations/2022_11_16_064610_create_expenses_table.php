<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('expense_id');
            $table->bigInteger('expense_head_id')->nullable();
            $table->string('expense_head_name')->nullable();
            $table->bigInteger('expense_trasection_id')->nullable();
            $table->bigInteger('expense_accounts_id')->nullable();
            $table->bigInteger('expense_amount')->nullable();
            $table->string('expense_date')->nullable();
            $table->string('expense_note')->nullable();
            $table->string('expense_create_date')->nullable();
            $table->string('expense_has_deleted')->default('NO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
