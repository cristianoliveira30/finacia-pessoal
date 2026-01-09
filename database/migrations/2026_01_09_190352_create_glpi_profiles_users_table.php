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
        Schema::create('glpi_profiles_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->unsignedInteger('profiles_id')->default(0)->index('profiles_id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(true)->index('is_recursive');
            $table->boolean('is_dynamic')->default(false)->index('is_dynamic');
            $table->tinyInteger('is_default_profile')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_profiles_users');
    }
};
