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
        Schema::create('glpi_plugin_fields_labeltranslations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plugin_fields_itemtype', 30)->index('plugin_fields_itemtype');
            $table->unsignedInteger('plugin_fields_items_id')->index('plugin_fields_items_id');
            $table->string('language', 5)->index('language');
            $table->string('label', 255)->nullable();

            $table->unique(['plugin_fields_itemtype', 'plugin_fields_items_id', 'language'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_fields_labeltranslations');
    }
};
