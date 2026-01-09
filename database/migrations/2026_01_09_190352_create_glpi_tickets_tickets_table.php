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
        Schema::create('glpi_tickets_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tickets_id_1')->default(0);
            $table->unsignedInteger('tickets_id_2')->default(0)->index('tickets_id_2');
            $table->integer('link')->default(1);

            $table->unique(['tickets_id_1', 'tickets_id_2'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_tickets_tickets');
    }
};
