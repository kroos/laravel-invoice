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
            $table->id();
            // $table->integer('id_sales');
$table->foreignId('id_sales')->constrained('sales')->cascadeOnDelete();

            // $table->integer('id_product');
            // $table->unsignedBigInteger('id_product');
$table->foreignId('id_product')->constrained('products')->cascadeOnDelete();
            $table->float('commission', 8, 2);
            $table->float('retail', 8, 2);
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();
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
