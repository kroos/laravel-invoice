<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('logins', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')
						->nullable()
						->constrained()
						->nullOnDelete();
			$table->string('username', 191)->unique();
			$table->string('slug', 191)->unique();
			$table->string('password');
			// $table->boolean('active');
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes('deleted_at', precision: 0);
		});

		Schema::create('password_reset_tokens', function (Blueprint $table) {
			$table->string('email')->primary();
			$table->string('token');
			$table->timestamp('created_at')->nullable();
		});

		// Schema::create('sessions', function (Blueprint $table) {
		// 	$table->string('id')->primary();
		// 	$table->foreignId('user_id')->nullable()->index();
		// 	$table->string('ip_address', 45)->nullable();
		// 	$table->text('user_agent')->nullable();
		// 	$table->longText('payload');
		// 	$table->integer('last_activity')->index();
		// });
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('logins');
		Schema::dropIfExists('password_reset_tokens');
		// Schema::dropIfExists('sessions');
	}
};
