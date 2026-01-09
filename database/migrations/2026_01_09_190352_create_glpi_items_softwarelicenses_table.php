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
        Schema::create('glpi_items_softwarelicenses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('items_id')->default(0);
            $table->string('itemtype', 100);
            $table->unsignedInteger('softwarelicenses_id')->default(0)->index('softwarelicenses_id');
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->boolean('is_dynamic')->default(false)->index('is_dynamic');

            $table->index(['itemtype', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_items_softwarelicenses');
    }
};
