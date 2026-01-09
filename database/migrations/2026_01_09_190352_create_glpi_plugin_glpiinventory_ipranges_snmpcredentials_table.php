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
        Schema::create('glpi_plugin_glpiinventory_ipranges_snmpcredentials', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plugin_glpiinventory_ipranges_id')->default(0)->index('plugin_glpiinventory_ipranges_id');
            $table->unsignedInteger('snmpcredentials_id')->default(0)->index('plugin_glpiinventory_configsecurities_id');
            $table->integer('rank')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_ipranges_snmpcredentials');
    }
};
