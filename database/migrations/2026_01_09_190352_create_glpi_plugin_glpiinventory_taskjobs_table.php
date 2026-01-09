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
        Schema::create('glpi_plugin_glpiinventory_taskjobs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plugin_glpiinventory_tasks_id')->default(0)->index('plugin_glpiinventory_tasks_id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->string('name', 255)->nullable();
            $table->timestamp('date_creation')->nullable();
            $table->string('method', 255)->nullable()->index('method');
            $table->text('targets')->nullable();
            $table->text('actors')->nullable();
            $table->text('comment')->nullable();
            $table->unsignedInteger('rescheduled_taskjob_id')->default(0);
            $table->text('statuscomments')->nullable();
            $table->text('enduser')->nullable();
            $table->tinyInteger('restrict_to_task_entity')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_taskjobs');
    }
};
