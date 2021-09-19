<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlipPostagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slip_postages', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('id_sales');
            $table->unsignedBigInteger('id_sales');
            $table->foreign('id_sales')->references('id')->on('sales');
            $table->text('mime');
            $table->longText('image');
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
        Schema::dropIfExists('slip_postages');
    }
}
