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
        Schema::create('glpi_plugin_glpiinventory_timeslotentries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plugin_glpiinventory_timeslots_id')->default(0)->index('plugin_fusioninventory_calendars_id');
            $table->unsignedInteger('entities_id')->default(0);
            $table->tinyInteger('is_recursive')->default(0);
            $table->tinyInteger('day')->default(1)->index('day');
            $table->integer('begin')->nullable();
            $table->integer('end')->nullable();

            $table->index(['plugin_glpiinventory_timeslots_id'], 'plugin_glpiinventory_timeslots_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_timeslotentries');
    }
};
