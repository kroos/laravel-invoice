<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferencesTable extends Migration
{
	
	public function up()
	{
		Schema::create('preferences', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->text('company_name');
			$table->text('company_registration');
			$table->longText('company_logo_image');
			$table->string('company_tagline');
			$table->text('company_address');
			$table->string('company_postcode');
			$table->text('company_logo_mime');
			$table->string('company_fixed_line');
			$table->string('company_mobile');
			$table->string('company_email');
			$table->integer('company_owner');
			$table->integer('company_person_in-charge');
			$table->timestamps();
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('preferences');
	}
}
