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
        Schema::create('glpi_slalevels_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tickets_id')->default(0);
            $table->unsignedInteger('slalevels_id')->default(0)->index('slalevels_id');
            $table->timestamp('date')->nullable();

            $table->unique(['tickets_id', 'slalevels_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_slalevels_tickets');
    }
};
