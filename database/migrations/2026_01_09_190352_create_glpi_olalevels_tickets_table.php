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
        Schema::create('glpi_olalevels_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tickets_id')->default(0);
            $table->unsignedInteger('olalevels_id')->default(0)->index('olalevels_id');
            $table->timestamp('date')->nullable();

            $table->unique(['tickets_id', 'olalevels_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_olalevels_tickets');
    }
};
