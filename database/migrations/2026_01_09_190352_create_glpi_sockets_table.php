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
        Schema::create('glpi_sockets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position')->default(0);
            $table->unsignedInteger('locations_id')->default(0);
            $table->string('name', 255)->nullable()->index('name');
            $table->unsignedInteger('socketmodels_id')->default(0)->index('socketmodels_id');
            $table->tinyInteger('wiring_side')->nullable()->default(1)->index('wiring_side');
            $table->string('itemtype', 255)->nullable();
            $table->unsignedInteger('items_id')->default(0);
            $table->unsignedInteger('networkports_id')->default(0)->index('networkports_id');
            $table->mediumText('comment')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');

            $table->index(['itemtype', 'items_id'], 'item');
            $table->index(['locations_id', 'name'], 'location_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_sockets');
    }
};
