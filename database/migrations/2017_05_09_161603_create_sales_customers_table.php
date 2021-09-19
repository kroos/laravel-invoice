<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('id_sales');
            $table->unsignedBigInteger('id_sales');
            $table->foreign('id_sales')->references('id')->on('sales');
            // $table->integer('id_customer');
            $table->unsignedBigInteger('id_customer');
            $table->foreign('id_customer')->references('id')->on('customers');
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
        Schema::dropIfExists('sales_customers');
    }
}
