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
        Schema::create('glpi_plugin_mreporting_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('classname', 255)->nullable();
            $table->boolean('is_active')->default(false)->index('is_active');
            $table->boolean('is_notified')->default(true);
            $table->boolean('show_graph')->default(false);
            $table->boolean('show_area')->default(false);
            $table->boolean('spline')->default(false);
            $table->string('show_label', 10)->nullable();
            $table->boolean('flip_data')->default(false);
            $table->string('unit', 10)->nullable();
            $table->string('default_delay', 10)->nullable();
            $table->string('condition', 255)->nullable();
            $table->string('graphtype', 255)->nullable()->default('SVG');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_mreporting_configs');
    }
};
