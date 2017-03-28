<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade');   // table name itself
            $table->integer('id_product');
            $table->foreign('id_product')->references('id')->on('products')->onUpdate('cascade');   // table name itself
            $table->date('commission_on');
            $table->decimal('retail', 5, 2);
            $table->decimal('commission', 5, 2);
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
        Schema::dropIfExists('transactions');
    }
}
