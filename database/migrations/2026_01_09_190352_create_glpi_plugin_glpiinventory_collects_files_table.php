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
        Schema::create('glpi_plugin_glpiinventory_collects_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->unsignedInteger('plugin_glpiinventory_collects_id')->default(0)->index('plugin_glpiinventory_collects_id');
            $table->string('dir', 255)->nullable();
            $table->integer('limit')->default(50);
            $table->tinyInteger('is_recursive')->default(0);
            $table->string('filter_regex', 255)->nullable();
            $table->integer('filter_sizeequals')->default(0);
            $table->integer('filter_sizegreater')->default(0);
            $table->integer('filter_sizelower')->default(0);
            $table->string('filter_checksumsha512', 255)->nullable();
            $table->string('filter_checksumsha2', 255)->nullable();
            $table->string('filter_name', 255)->nullable();
            $table->string('filter_iname', 255)->nullable();
            $table->tinyInteger('filter_is_file')->default(1);
            $table->tinyInteger('filter_is_dir')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_glpiinventory_collects_files');
    }
};
