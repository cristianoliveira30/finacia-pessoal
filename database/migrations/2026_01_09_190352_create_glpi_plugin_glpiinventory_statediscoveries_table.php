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
        Schema::create('glpi_plugin_glpiinventory_statediscoveries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plugin_glpiinventory_taskjob_id')->default(0)->index('plugin_glpiinventory_taskjob_id');
            $table->unsignedInteger('agents_id')->default(0)->index('plugin_glpiinventory_agents_id');
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->timestamp('date_mod')->nullable();
            $table->integer('threads')->default(0);
            $table->integer('nb_ip')->default(0);
            $table->integer('nb_found')->default(0);
            $table->integer('nb_error')->default(0);
            $table->integer('nb_exists')->default(0);
            $table->integer('nb_import')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_statediscoveries');
    }
};
