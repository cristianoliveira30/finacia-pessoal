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
        Schema::create('glpi_slalevelactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('slalevels_id')->default(0)->index('slalevels_id');
            $table->string('action_type', 255)->nullable();
            $table->string('field', 255)->nullable();
            $table->string('value', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_slalevelactions');
    }
};
