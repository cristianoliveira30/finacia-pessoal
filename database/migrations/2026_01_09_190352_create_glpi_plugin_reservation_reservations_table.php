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
        Schema::create('glpi_plugin_reservation_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reservations_id')->index('reservations_id');
            $table->timestamp('baselinedate')->useCurrent();
            $table->timestamp('effectivedate')->nullable();
            $table->timestamp('mailingdate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_reservation_reservations');
    }
};
