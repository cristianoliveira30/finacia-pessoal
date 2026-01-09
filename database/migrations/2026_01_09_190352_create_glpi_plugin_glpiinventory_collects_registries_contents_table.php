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
        Schema::create('glpi_plugin_glpiinventory_collects_registries_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('computers_id')->default(0)->index('computers_id');
            $table->unsignedInteger('plugin_glpiinventory_collects_registries_id')->default(0)->index('plugin_glpiinventory_collects_registries_id');
            $table->string('key', 255)->nullable();
            $table->string('value', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_collects_registries_contents');
    }
};
