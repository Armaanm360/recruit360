<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_cards', function (Blueprint $table) {

            $table->increments('training_card_id');
            $table->bigInteger('training_card_client_id');
            $table->string('training_card_status');
            $table->string('training_card_file');
            $table->bigInteger('training_card_created_by')->nullable();
            $table->string('training_card_has_deleted')->nullable()->default("NO");
            $table->string('training_card_updated');
            $table->string('training_card_create_date');
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
        Schema::dropIfExists('training_cards');
    }
}