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
        Schema::create('glpi_rssfeeds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->mediumText('comment')->nullable();
            $table->mediumText('url')->nullable();
            $table->integer('refresh_rate')->default(86400);
            $table->integer('max_items')->default(20);
            $table->boolean('have_error')->default(false)->index('have_error');
            $table->boolean('is_active')->default(false)->index('is_active');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_rssfeeds');
    }
};
