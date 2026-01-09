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
        Schema::create('glpi_networkportfiberchannels', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('networkports_id')->default(0)->unique('networkports_id');
            $table->unsignedInteger('items_devicenetworkcards_id')->default(0)->index('card');
            $table->unsignedInteger('networkportfiberchanneltypes_id')->default(0)->index('type');
            $table->string('wwn', 50)->nullable()->default('')->index('wwn');
            $table->integer('speed')->default(10)->index('speed')->comment('Mbit/s: 10, 100, 1000, 10000');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_networkportfiberchannels');
    }
};
