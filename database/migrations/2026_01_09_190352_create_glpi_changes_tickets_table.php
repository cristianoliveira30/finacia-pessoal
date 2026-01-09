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
        Schema::create('glpi_changes_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('changes_id')->default(0);
            $table->unsignedInteger('tickets_id')->default(0)->index('tickets_id');

            $table->unique(['changes_id', 'tickets_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_changes_tickets');
    }
};
