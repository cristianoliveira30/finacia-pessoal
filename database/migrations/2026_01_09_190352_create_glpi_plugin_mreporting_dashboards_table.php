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
        Schema::create('glpi_plugin_mreporting_dashboards', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('reports_id');
            $table->string('configuration', 500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_mreporting_dashboards');
    }
};
