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
        Schema::create('glpi_plugin_glpiinventory_collects_files_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('computers_id')->default(0);
            $table->unsignedInteger('plugin_glpiinventory_collects_files_id')->default(0)->index('plugin_glpiinventory_collects_files_id');
            $table->text('pathfile')->nullable();
            $table->integer('size')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_collects_files_contents');
    }
};
