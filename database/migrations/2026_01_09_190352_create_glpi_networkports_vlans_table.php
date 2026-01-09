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
        Schema::create('glpi_networkports_vlans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('networkports_id')->default(0);
            $table->unsignedInteger('vlans_id')->default(0)->index('vlans_id');
            $table->boolean('tagged')->default(false);

            $table->unique(['networkports_id', 'vlans_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_networkports_vlans');
    }
};
