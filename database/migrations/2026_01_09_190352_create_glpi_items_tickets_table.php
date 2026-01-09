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
        Schema::create('glpi_items_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemtype', 255)->nullable();
            $table->unsignedInteger('items_id')->default(0);
            $table->unsignedInteger('tickets_id')->default(0)->index('tickets_id');

            $table->unique(['itemtype', 'items_id', 'tickets_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_items_tickets');
    }
};
