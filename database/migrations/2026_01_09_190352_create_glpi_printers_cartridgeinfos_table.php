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
        Schema::create('glpi_printers_cartridgeinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('printers_id')->index('printers_id');
            $table->string('property', 255);
            $table->string('value', 255);
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_printers_cartridgeinfos');
    }
};
