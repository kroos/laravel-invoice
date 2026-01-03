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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('event', 64);
            $table->string('model_type');
            $table->unsignedBigInteger('model_id')->index();
            $table->string('route_name')->nullable();
            $table->string('method', 10)->nullable();
            $table->string('url')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('guard')->nullable();
            $table->boolean('is_critical')->default(false);
            $table->string('description')->nullable();
            $table->json('changes')->nullable();
            $table->json('snapshot')->nullable();
            $table->json('meta')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index(['model_type', 'model_id']);
            $table->index(['user_id']);
            $table->index(['event']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
