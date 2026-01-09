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
        Schema::create('glpi_impactitems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemtype', 255)->default('');
            $table->unsignedInteger('items_id')->default(0);
            $table->unsignedInteger('parent_id')->default(0)->index('parent_id');
            $table->unsignedInteger('impactcontexts_id')->default(0)->index('impactcontexts_id');
            $table->tinyInteger('is_slave')->default(1);

            $table->index(['itemtype', 'items_id'], 'source');
            $table->unique(['itemtype', 'items_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_impactitems');
    }
};
