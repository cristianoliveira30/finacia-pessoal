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
        Schema::create('glpi_plugin_fields_tickettelefones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('items_id');
            $table->string('itemtype', 255)->nullable()->default('Ticket');
            $table->unsignedInteger('plugin_fields_containers_id')->default(6);
            $table->string('ramalfield', 255)->nullable();

            $table->unique(['itemtype', 'items_id', 'plugin_fields_containers_id'], 'itemtype_item_container');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_plugin_fields_tickettelefones');
    }
};
