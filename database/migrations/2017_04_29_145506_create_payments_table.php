<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('id_sales');
            $table->unsignedBigInteger('id_sales');
            $table->foreign('id_sales')->references('id')->on('sales');
            // $table->integer('id_bank');
            $table->unsignedBigInteger('id_bank');
            $table->foreign('id_bank')->references('id')->on('banks');
            $table->date('date_payment');
            $table->float('amount', 8, 2);
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
        Schema::dropIfExists('payments');
    }
}
