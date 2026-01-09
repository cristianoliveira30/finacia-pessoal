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
        Schema::create('glpi_plugin_glpiinventory_pcidevices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('deviceid', 255)->nullable()->index('deviceid');
            $table->string('name', 255)->nullable();
            $table->unsignedInteger('plugin_glpiinventory_pcivendor_id')->default(0)->index('plugin_glpiinventory_pcivendor_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_pcidevices');
    }
};
