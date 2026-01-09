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
        Schema::create('glpi_dashboards_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dashboards_dashboards_id')->index('dashboards_dashboards_id');
            $table->string('gridstack_id', 255);
            $table->string('card_id', 255);
            $table->integer('x')->nullable();
            $table->integer('y')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->mediumText('card_options')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_dashboards_items');
    }
};
