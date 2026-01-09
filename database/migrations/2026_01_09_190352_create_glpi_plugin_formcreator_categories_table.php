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
        Schema::create('glpi_plugin_formcreator_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->default('')->index('name');
            $table->mediumText('comment')->nullable();
            $table->string('completename', 255)->nullable();
            $table->unsignedInteger('plugin_formcreator_categories_id')->default(0)->index('plugin_formcreator_categories_id');
            $table->integer('level')->default(1);
            $table->longText('sons_cache')->nullable();
            $table->longText('ancestors_cache')->nullable();
            $table->unsignedInteger('knowbaseitemcategories_id')->default(0)->index('knowbaseitemcategories_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_formcreator_categories');
    }
};
