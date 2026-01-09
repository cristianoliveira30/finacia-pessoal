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
        Schema::create('glpi_useremails', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('users_id')->default(0);
            $table->boolean('is_default')->default(false)->index('is_default');
            $table->boolean('is_dynamic')->default(false)->index('is_dynamic');
            $table->string('email', 255)->nullable()->index('email');

            $table->unique(['users_id', 'email'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_useremails');
    }
};
