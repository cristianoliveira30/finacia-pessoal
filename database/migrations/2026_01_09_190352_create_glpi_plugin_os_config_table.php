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
        Schema::create('glpi_plugin_os_config', function (Blueprint $table) {
            $table->unsignedInteger('id')->default(1)->primary();
            $table->string('name', 255)->default('0');
            $table->string('cnpj', 50)->default('0');
            $table->string('address', 50)->default('0');
            $table->string('phone', 255)->default('0');
            $table->string('city', 255)->default('0');
            $table->string('site', 50)->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_os_config');
    }
};
