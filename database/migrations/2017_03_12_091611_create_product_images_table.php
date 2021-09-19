<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('product_images', function (Blueprint $table) {
			$table->bigIncrements('id');
			// $table->integer('id_product');
			$table->unsignedBigInteger('id_product');
			$table->foreign('id_product')->references('id')->on('products');
			$table->text('mime');
			// $table->longText('image')->unique(); // --> for sqlite
			$table->longText('image');
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
		Schema::dropIfExists('product_images');
	}
}
