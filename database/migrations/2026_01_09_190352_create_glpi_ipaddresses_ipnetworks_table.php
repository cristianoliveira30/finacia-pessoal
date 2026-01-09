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
        Schema::create('glpi_ipaddresses_ipnetworks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ipaddresses_id')->default(0);
            $table->unsignedInteger('ipnetworks_id')->default(0)->index('ipnetworks_id');

            $table->unique(['ipaddresses_id', 'ipnetworks_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_ipaddresses_ipnetworks');
    }
};
