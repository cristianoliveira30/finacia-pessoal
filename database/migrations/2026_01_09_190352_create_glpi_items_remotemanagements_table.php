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
        Schema::create('glpi_items_remotemanagements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemtype', 100)->nullable();
            $table->unsignedInteger('items_id')->default(0);
            $table->string('remoteid', 255)->nullable();
            $table->string('type', 255)->nullable();
            $table->tinyInteger('is_dynamic')->default(0)->index('is_dynamic');
            $table->tinyInteger('is_deleted')->default(0)->index('is_deleted');

            $table->index(['itemtype', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_items_remotemanagements');
    }
};
