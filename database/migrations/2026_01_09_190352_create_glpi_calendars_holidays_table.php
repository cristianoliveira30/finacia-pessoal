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
        Schema::create('glpi_calendars_holidays', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('calendars_id')->default(0);
            $table->unsignedInteger('holidays_id')->default(0)->index('holidays_id');

            $table->unique(['calendars_id', 'holidays_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_calendars_holidays');
    }
};
