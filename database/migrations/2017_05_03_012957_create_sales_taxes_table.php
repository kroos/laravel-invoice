<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_taxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('id_sales');
            $table->unsignedBigInteger('id_sales');
            $table->foreign('id_sales')->references('id')->on('sales');
            // $table->integer('id_tax');
            $table->unsignedBigInteger('id_tax');
            $table->foreign('id_tax')->references('id')->on('taxes');
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
        Schema::dropIfExists('sales_taxes');
    }
}
