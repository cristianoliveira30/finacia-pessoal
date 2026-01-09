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
        Schema::create('glpi_impactcompounds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->default('')->index('name');
            $table->string('color', 255)->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_impactcompounds');
    }
};
