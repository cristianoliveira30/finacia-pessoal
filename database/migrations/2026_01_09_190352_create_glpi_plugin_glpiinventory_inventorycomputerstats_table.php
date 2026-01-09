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
        Schema::create('glpi_plugin_glpiinventory_inventorycomputerstats', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->smallInteger('day')->default(0);
            $table->tinyInteger('hour')->default(0);
            $table->integer('counter')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_inventorycomputerstats');
    }
};
