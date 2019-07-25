<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_items', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('id_sales')->unsigned()->index();
            $table->foreign('id_sales')->references('id')->on('sales');
            $table->integer('id_product')->unsigned()->index();
            $table->foreign('id_product')->references('id')->on('products');
            $table->float('commission', 8, 2);
            $table->float('retail', 8, 2);
            $table->integer('quantity');
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
        Schema::dropIfExists('sales_items');
    }
}
