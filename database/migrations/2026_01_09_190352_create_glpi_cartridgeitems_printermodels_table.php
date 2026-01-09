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
        Schema::create('glpi_cartridgeitems_printermodels', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cartridgeitems_id')->default(0)->index('cartridgeitems_id');
            $table->unsignedInteger('printermodels_id')->default(0);

            $table->unique(['printermodels_id', 'cartridgeitems_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_cartridgeitems_printermodels');
    }
};
