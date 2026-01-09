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
        Schema::create('backup_glpi_plugin_formcreator_targets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plugin_formcreator_forms_id')->index('plugin_formcreator_forms_id');
            $table->string('itemtype', 100)->default('PluginFormcreatorTargetTicket');
            $table->unsignedInteger('items_id')->default(0);
            $table->string('name', 255)->default('');
            $table->string('uuid', 255)->nullable();

            $table->index(['itemtype', 'items_id'], 'itemtype_items_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backup_glpi_plugin_formcreator_targets');
    }
};
