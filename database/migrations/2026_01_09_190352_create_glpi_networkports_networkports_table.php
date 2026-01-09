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
        Schema::create('glpi_networkports_networkports', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('networkports_id_1')->default(0);
            $table->unsignedInteger('networkports_id_2')->default(0)->index('networkports_id_2');

            $table->unique(['networkports_id_1', 'networkports_id_2'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_networkports_networkports');
    }
};
