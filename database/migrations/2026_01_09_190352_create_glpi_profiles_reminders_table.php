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
        Schema::create('glpi_profiles_reminders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reminders_id')->default(0)->index('reminders_id');
            $table->unsignedInteger('profiles_id')->default(0)->index('profiles_id');
            $table->unsignedInteger('entities_id')->nullable()->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->tinyInteger('no_entity_restriction')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_profiles_reminders');
    }
};
