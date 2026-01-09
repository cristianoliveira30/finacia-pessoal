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
        Schema::create('glpi_plugin_fields_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('label', 255)->nullable();
            $table->string('type', 25)->nullable();
            $table->unsignedInteger('plugin_fields_containers_id')->default(0)->index('plugin_fields_containers_id');
            $table->integer('ranking')->default(0);
            $table->string('default_value', 255)->nullable();
            $table->boolean('is_active')->default(true)->index('is_active');
            $table->boolean('is_readonly')->default(true)->index('is_readonly');
            $table->boolean('mandatory')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_fields_fields');
    }
};
