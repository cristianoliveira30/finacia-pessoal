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
        Schema::create('glpi_plugin_dashboard_count', function (Blueprint $table) {
            $table->integer('type');
            $table->unsignedInteger('id');
            $table->integer('quant')->nullable();

            $table->primary(['type', 'id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_dashboard_count');
    }
};
