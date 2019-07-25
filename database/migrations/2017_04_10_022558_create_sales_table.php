<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
	public function up()
	{
		Schema::create('sales', function (Blueprint $table) {
			$table->integerIncrements('id');
			$table->integer('id_user')->unsigned()->index();
			$table->foreign('id_user')->references('id')->on('users');
			$table->date('date_sale');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('sales');
	}
}
