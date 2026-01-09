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
        Schema::create('glpi_plugin_glpiinventory_collects_wmis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->unsignedInteger('plugin_glpiinventory_collects_id')->default(0)->index('plugin_glpiinventory_collects_id');
            $table->string('moniker', 255)->nullable();
            $table->string('class', 255)->nullable();
            $table->string('properties', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_collects_wmis');
    }
};
