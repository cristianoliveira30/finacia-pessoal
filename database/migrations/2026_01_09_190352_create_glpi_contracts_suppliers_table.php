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
        Schema::create('glpi_contracts_suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('suppliers_id')->default(0);
            $table->unsignedInteger('contracts_id')->default(0)->index('contracts_id');

            $table->unique(['suppliers_id', 'contracts_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_contracts_suppliers');
    }
};
