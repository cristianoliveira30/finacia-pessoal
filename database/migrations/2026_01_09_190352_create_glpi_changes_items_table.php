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
        Schema::create('glpi_changes_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('changes_id')->default(0);
            $table->string('itemtype', 100)->nullable();
            $table->unsignedInteger('items_id')->default(0);

            $table->index(['itemtype', 'items_id'], 'item');
            $table->unique(['changes_id', 'itemtype', 'items_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_changes_items');
    }
};
