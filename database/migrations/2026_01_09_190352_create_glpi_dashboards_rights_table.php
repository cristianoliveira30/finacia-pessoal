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
        Schema::create('glpi_dashboards_rights', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dashboards_dashboards_id');
            $table->string('itemtype', 100);
            $table->unsignedInteger('items_id');

            $table->index(['itemtype', 'items_id'], 'item');
            $table->unique(['dashboards_dashboards_id', 'itemtype', 'items_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_dashboards_rights');
    }
};
