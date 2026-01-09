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
        Schema::create('glpi_contacts_suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('suppliers_id')->default(0);
            $table->unsignedInteger('contacts_id')->default(0)->index('contacts_id');

            $table->unique(['suppliers_id', 'contacts_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_contacts_suppliers');
    }
};
