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
        Schema::create('glpi_items_deviceprocessors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('items_id')->default(0);
            $table->string('itemtype', 255)->nullable();
            $table->unsignedInteger('deviceprocessors_id')->default(0)->index('deviceprocessors_id');
            $table->integer('frequency')->default(0)->index('specificity');
            $table->string('serial', 255)->nullable()->index('serial');
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->boolean('is_dynamic')->default(false)->index('is_dynamic');
            $table->integer('nbcores')->nullable()->index('nbcores');
            $table->integer('nbthreads')->nullable()->index('nbthreads');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->string('busID', 255)->nullable()->index('busid');
            $table->string('otherserial', 255)->nullable()->index('otherserial');
            $table->unsignedInteger('locations_id')->default(0)->index('locations_id');
            $table->unsignedInteger('states_id')->default(0)->index('states_id');

            $table->index(['itemtype', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_items_deviceprocessors');
    }
};
