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
        Schema::create('glpi_plugin_glpiinventory_taskjobstates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('plugin_glpiinventory_taskjobs_id')->default(0)->index('plugin_glpiinventory_taskjobs_id');
            $table->unsignedInteger('items_id')->default(0);
            $table->string('itemtype', 100)->nullable();
            $table->integer('state')->default(0);
            $table->unsignedInteger('agents_id')->default(0);
            $table->text('specificity')->nullable();
            $table->string('uniqid', 255)->nullable();
            $table->timestamp('date_start')->nullable();
            $table->integer('nb_retry')->default(0);
            $table->integer('max_retry')->default(1);

            $table->index(['agents_id', 'state'], 'agents_id_state');
            $table->index(['agents_id', 'plugin_glpiinventory_taskjobs_id', 'items_id', 'itemtype', 'id', 'state'], 'plugin_fusioninventory_agents_ids_states');
            $table->index(['plugin_glpiinventory_taskjobs_id', 'state'], 'plugin_fusioninventory_taskjob_2');
            $table->index(['agents_id', 'plugin_glpiinventory_taskjobs_id', 'items_id', 'itemtype', 'id', 'state'], 'plugin_glpiinventory_agents_items_states');
            $table->index(['uniqid', 'state'], 'uniqid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_taskjobstates');
    }
};
