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
        Schema::create('glpi_calendarsegments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('calendars_id')->default(0)->index('calendars_id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->boolean('day')->default(true)->index('day')->comment('numer of the day based on date(w)');
            $table->time('begin')->nullable();
            $table->time('end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_calendarsegments');
    }
};
