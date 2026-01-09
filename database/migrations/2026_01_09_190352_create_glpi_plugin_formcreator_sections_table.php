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
        Schema::create('glpi_plugin_formcreator_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->default('');
            $table->unsignedInteger('plugin_formcreator_forms_id')->default(0)->index('plugin_formcreator_forms_id');
            $table->integer('order')->default(0);
            $table->integer('show_rule')->default(1);
            $table->string('uuid', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_formcreator_sections');
    }
};
