<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('vendor_id');
            $table->bigInteger('vendor_entry_id')->nullable();
            $table->bigInteger('vendor_name')->nullable();
            $table->string('vendor_company_name')->nullable();
            $table->string('vendor_email')->nullable();
            $table->string('vendor_phone')->nullable();
            $table->string('vendor_address')->nullable();
            $table->string('vendor_date')->nullable();
            $table->string('vendor_has_deleted')->default('NO');
            $table->bigInteger('vendor_deleted_by')->nullable();
            $table->bigInteger('vendor_created_by')->nullable();
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
        Schema::dropIfExists('vendors');
    }
}
