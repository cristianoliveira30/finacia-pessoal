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
        Schema::create('glpi_plugin_glpiinventory_taskjoblogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('plugin_glpiinventory_taskjobstates_id')->default(0)->index('plugin_glpiinventory_taskjobstates_id');
            $table->timestamp('date')->nullable();
            $table->unsignedInteger('items_id')->default(0);
            $table->string('itemtype', 100)->nullable();
            $table->integer('state')->default(0);
            $table->text('comment')->nullable();

            $table->index(['itemtype', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_taskjoblogs');
    }
};
