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
        Schema::create('glpi_plugin_glpiinventory_agentmodules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('modulename', 255)->nullable()->unique('modulename');
            $table->tinyInteger('is_active')->default(0)->index('is_active');
            $table->text('exceptions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_agentmodules');
    }
};
