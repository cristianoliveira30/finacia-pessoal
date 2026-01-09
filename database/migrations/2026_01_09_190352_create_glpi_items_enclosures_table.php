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
        Schema::create('glpi_items_enclosures', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('enclosures_id');
            $table->string('itemtype', 255);
            $table->unsignedInteger('items_id');
            $table->integer('position');

            $table->unique(['itemtype', 'items_id'], 'item');
            $table->index(['enclosures_id', 'itemtype', 'items_id'], 'relation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_items_enclosures');
    }
};
