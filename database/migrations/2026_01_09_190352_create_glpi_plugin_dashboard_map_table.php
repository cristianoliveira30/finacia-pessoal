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
        Schema::create('glpi_plugin_dashboard_map', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id');
            $table->string('location', 50)->nullable()->unique('location');
            $table->float('lat');
            $table->float('lng');

            $table->unique(['location'], 'location_2');
            $table->unique(['location'], 'location_3');
            $table->primary(['id', 'entities_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_dashboard_map');
    }
};
