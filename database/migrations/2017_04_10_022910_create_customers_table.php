<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sales');
            $table->foreign('id_sales')->references('id')->on('sales');
            $table->text('client');
            $table->longText('client_address')->nullable();
            $table->string('client_poskod')->nullable();
            $table->string('client_phone')->nullable();
            $table->string('client_email')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
