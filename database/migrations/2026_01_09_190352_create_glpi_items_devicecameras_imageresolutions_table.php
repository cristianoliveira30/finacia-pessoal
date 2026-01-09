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
        Schema::create('glpi_items_devicecameras_imageresolutions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('items_devicecameras_id')->default(0)->index('items_devicecameras_id');
            $table->unsignedInteger('imageresolutions_id')->default(0)->index('imageresolutions_id');
            $table->tinyInteger('is_dynamic')->default(0)->index('is_dynamic');
            $table->tinyInteger('is_deleted')->default(0)->index('is_deleted');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_items_devicecameras_imageresolutions');
    }
};
