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
        Schema::create('glpi_items_devicecameras', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('items_id')->default(0)->index('items_id');
            $table->string('itemtype', 255)->nullable();
            $table->unsignedInteger('devicecameras_id')->default(0)->index('devicecameras_id');
            $table->tinyInteger('is_deleted')->default(0)->index('is_deleted');
            $table->tinyInteger('is_dynamic')->default(0)->index('is_dynamic');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->tinyInteger('is_recursive')->default(0)->index('is_recursive');

            $table->index(['itemtype', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_items_devicecameras');
    }
};
