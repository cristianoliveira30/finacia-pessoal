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
        Schema::create('glpi_networkportconnectionlogs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date')->nullable()->index('date');
            $table->tinyInteger('connected')->default(0);
            $table->unsignedInteger('networkports_id_source')->default(0)->index('networkports_id_source');
            $table->unsignedInteger('networkports_id_destination')->default(0)->index('networkports_id_destination');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_networkportconnectionlogs');
    }
};
