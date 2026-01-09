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
        Schema::create('glpi_impactrelations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemtype_source', 255)->default('');
            $table->unsignedInteger('items_id_source')->default(0);
            $table->string('itemtype_impacted', 255)->default('');
            $table->unsignedInteger('items_id_impacted')->default(0);

            $table->index(['itemtype_impacted', 'items_id_impacted'], 'impacted_asset');
            $table->unique(['itemtype_source', 'items_id_source', 'itemtype_impacted', 'items_id_impacted'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_impactrelations');
    }
};
