<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlipNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slip_numbers', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('id_sales');
            $table->unsignedBigInteger('id_sales');
            $table->foreign('id_sales')->references('id')->on('sales');
            $table->text('tracking_number');
            $table->softDeletes();
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
        Schema::dropIfExists('slip_numbers');
    }
}
