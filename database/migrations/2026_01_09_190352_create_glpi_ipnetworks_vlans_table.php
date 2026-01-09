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
        Schema::create('glpi_ipnetworks_vlans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ipnetworks_id')->default(0);
            $table->unsignedInteger('vlans_id')->default(0)->index('vlans_id');

            $table->unique(['ipnetworks_id', 'vlans_id'], 'link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_ipnetworks_vlans');
    }
};
