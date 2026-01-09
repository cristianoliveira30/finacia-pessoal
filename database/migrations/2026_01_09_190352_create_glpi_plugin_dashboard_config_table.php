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
        Schema::create('glpi_plugin_dashboard_config', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('value', 125);
            $table->string('users_id', 25)->default('');

            $table->unique(['name', 'users_id'], 'name');
            $table->index(['name', 'users_id'], 'name_2');
            $table->primary(['id', 'name', 'value', 'users_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_dashboard_config');
    }
};
