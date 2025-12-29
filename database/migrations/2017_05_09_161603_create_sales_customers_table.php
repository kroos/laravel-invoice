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
            $table->id();
            // $table->integer('id_sales');
            // $table->unsignedBigInteger('id_sales');
$table->foreignId('id_sales')->constrained('sales')->cascadeOnDelete();
$table->foreignId('id_customer')->constrained('customers')->cascadeOnDelete();

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
        Schema::dropIfExists('sales_customers');
    }
}
