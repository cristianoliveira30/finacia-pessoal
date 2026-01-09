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
        Schema::create('glpi_cables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->unsignedInteger('entities_id')->default(0);
            $table->tinyInteger('is_recursive')->default(0)->index('is_recursive');
            $table->string('itemtype_endpoint_a', 255)->nullable();
            $table->string('itemtype_endpoint_b', 255)->nullable();
            $table->unsignedInteger('items_id_endpoint_a')->default(0)->index('items_id_endpoint_a');
            $table->unsignedInteger('items_id_endpoint_b')->default(0)->index('items_id_endpoint_b');
            $table->unsignedInteger('socketmodels_id_endpoint_a')->default(0)->index('socketmodels_id_endpoint_a');
            $table->unsignedInteger('socketmodels_id_endpoint_b')->default(0)->index('socketmodels_id_endpoint_b');
            $table->unsignedInteger('sockets_id_endpoint_a')->default(0)->index('sockets_id_endpoint_a');
            $table->unsignedInteger('sockets_id_endpoint_b')->default(0)->index('sockets_id_endpoint_b');
            $table->unsignedInteger('cablestrands_id')->default(0)->index('cablestrands_id');
            $table->string('color', 255)->nullable();
            $table->string('otherserial', 255)->nullable();
            $table->unsignedInteger('states_id')->default(0)->index('states_id');
            $table->unsignedInteger('users_id_tech')->default(0)->index('users_id_tech');
            $table->unsignedInteger('cabletypes_id')->default(0)->index('cabletypes_id');
            $table->mediumText('comment')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->tinyInteger('is_deleted')->default(0)->index('is_deleted');

            $table->index(['entities_id', 'name'], 'complete');
            $table->index(['itemtype_endpoint_a', 'items_id_endpoint_a'], 'item_endpoint_a');
            $table->index(['itemtype_endpoint_b', 'items_id_endpoint_b'], 'item_endpoint_b');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_cables');
    }
};
