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
        Schema::create('backup_glpi_plugin_formcreator_targettickets_actors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plugin_formcreator_targettickets_id')->index('plugin_formcreator_targettickets_id');
            $table->integer('actor_role')->default(1);
            $table->integer('actor_type')->default(1);
            $table->integer('actor_value')->nullable();
            $table->boolean('use_notification')->default(true);
            $table->string('uuid', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backup_glpi_plugin_formcreator_targettickets_actors');
    }
};
