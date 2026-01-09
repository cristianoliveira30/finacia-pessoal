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
        Schema::create('glpi_plugin_formcreator_forms_validators', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plugin_formcreator_forms_id')->default(0);
            $table->string('itemtype', 255)->default('');
            $table->unsignedInteger('items_id')->default(0);
            $table->string('uuid', 255)->nullable();

            $table->unique(['plugin_formcreator_forms_id', 'itemtype', 'items_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_formcreator_forms_validators');
    }
};
