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
        Schema::create('glpi_items_racks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('racks_id');
            $table->string('itemtype', 255);
            $table->unsignedInteger('items_id');
            $table->integer('position');
            $table->boolean('orientation')->nullable();
            $table->string('bgcolor', 7)->nullable();
            $table->boolean('hpos')->default(false);
            $table->boolean('is_reserved')->default(false);

            $table->unique(['itemtype', 'items_id', 'is_reserved'], 'item');
            $table->index(['racks_id', 'itemtype', 'items_id'], 'relation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_items_racks');
    }
};
