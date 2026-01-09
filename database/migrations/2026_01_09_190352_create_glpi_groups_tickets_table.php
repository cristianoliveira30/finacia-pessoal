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
        Schema::create('glpi_groups_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tickets_id')->default(0);
            $table->unsignedInteger('groups_id')->default(0);
            $table->integer('type')->default(1);

            $table->index(['groups_id', 'type'], 'group');
            $table->unique(['tickets_id', 'type', 'groups_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_groups_tickets');
    }
};
