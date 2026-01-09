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
        Schema::create('glpi_items_disks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->string('itemtype', 255)->nullable();
            $table->unsignedInteger('items_id')->default(0);
            $table->string('name', 255)->nullable()->index('name');
            $table->string('device', 255)->nullable()->index('device');
            $table->string('mountpoint', 255)->nullable()->index('mountpoint');
            $table->unsignedInteger('filesystems_id')->default(0)->index('filesystems_id');
            $table->integer('totalsize')->default(0)->index('totalsize');
            $table->integer('freesize')->default(0)->index('freesize');
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->boolean('is_dynamic')->default(false)->index('is_dynamic');
            $table->integer('encryption_status')->default(0);
            $table->string('encryption_tool', 255)->nullable();
            $table->string('encryption_algorithm', 255)->nullable();
            $table->string('encryption_type', 255)->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');

            $table->index(['itemtype', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_items_disks');
    }
};
