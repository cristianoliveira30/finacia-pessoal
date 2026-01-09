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
        Schema::create('glpi_domains_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('domains_id')->default(0);
            $table->unsignedInteger('items_id')->default(0);
            $table->string('itemtype', 100);
            $table->unsignedInteger('domainrelations_id')->default(0)->index('domainrelations_id');
            $table->tinyInteger('is_dynamic')->default(0)->index('is_dynamic');
            $table->tinyInteger('is_deleted')->default(0)->index('is_deleted');

            $table->index(['itemtype', 'items_id'], 'item');
            $table->unique(['domains_id', 'itemtype', 'items_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_domains_items');
    }
};
