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
        Schema::create('glpi_appliances_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('appliances_id')->default(0);
            $table->unsignedInteger('items_id')->default(0);
            $table->string('itemtype', 100)->default('');

            $table->index(['itemtype', 'items_id'], 'item');
            $table->unique(['appliances_id', 'items_id', 'itemtype'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_appliances_items');
    }
};
