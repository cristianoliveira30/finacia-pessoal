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
        Schema::create('glpi_links_itemtypes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('links_id')->default(0)->index('links_id');
            $table->string('itemtype', 100);

            $table->unique(['itemtype', 'links_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_links_itemtypes');
    }
};
