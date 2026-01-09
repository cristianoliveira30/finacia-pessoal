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
        Schema::create('glpi_dashboards_filters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dashboards_dashboards_id')->default(0)->index('dashboards_dashboards_id');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->longText('filter')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_dashboards_filters');
    }
};
