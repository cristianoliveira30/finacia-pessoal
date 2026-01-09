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
        Schema::create('glpi_plugin_glpiinventory_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->string('name', 255)->nullable();
            $table->timestamp('date_creation')->nullable();
            $table->text('comment')->nullable();
            $table->tinyInteger('is_active')->default(0)->index('is_active');
            $table->timestamp('datetime_start')->nullable();
            $table->timestamp('datetime_end')->nullable();
            $table->unsignedInteger('plugin_glpiinventory_timeslots_prep_id')->default(0)->index('plugin_glpiinventory_timeslots_prep_id');
            $table->unsignedInteger('plugin_glpiinventory_timeslots_exec_id')->default(0)->index('plugin_glpiinventory_timeslots_exec_id');
            $table->timestamp('last_agent_wakeup')->nullable();
            $table->integer('wakeup_agent_counter')->default(0)->index('wakeup_agent_counter');
            $table->integer('wakeup_agent_time')->default(0);
            $table->boolean('reprepare_if_successful')->default(true)->index('reprepare_if_successful');
            $table->boolean('is_deploy_on_demand')->default(false)->index('is_deploy_on_demand');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_tasks');
    }
};
