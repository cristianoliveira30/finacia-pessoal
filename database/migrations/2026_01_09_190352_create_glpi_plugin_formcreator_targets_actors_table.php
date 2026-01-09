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
        Schema::create('glpi_plugin_formcreator_targets_actors', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('itemtype', 255)->nullable();
            $table->unsignedInteger('items_id')->default(0);
            $table->integer('actor_role')->default(1);
            $table->integer('actor_type')->default(1);
            $table->unsignedInteger('actor_value')->default(0);
            $table->boolean('use_notification')->default(true);
            $table->string('uuid', 255)->nullable();

            $table->index(['itemtype', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_formcreator_targets_actors');
    }
};
