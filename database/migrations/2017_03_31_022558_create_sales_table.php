<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
	public function up()
	{
		Schema::create('sales', function (Blueprint $table) {
			$table->id();
      $table->foreignId('id_user')->constrained('users')->cascadeOnDelete();
			$table->date('date_sale');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::dropIfExists('sales');
	}
}
