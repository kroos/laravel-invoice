<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferencesTable extends Migration
{
	
	public function up()
	{
		Schema::create('preferences', function (Blueprint $table) {
			$table->increments('id');
			$table->text('company_name');
			$table->text('company_address');
			$table->string('company_postcode');
			$table->text('company_logo_mime');
			$table->longText('company_logo_image');
			$table->string('company_tagline');
			$table->string('company_fixed_line');
			$table->string('company_mobile');
			$table->text('company_registration');
			$table->string('company_owner');
			$table->string('company_owner_mobile');
			$table->string('company_person_in-charge');
			$table->string('company_person_in-charge_mobile');
			$table->timestamps();
		});
	}
	
	public function down()
	{
		Schema::dropIfExists('preferences');
	}
}
