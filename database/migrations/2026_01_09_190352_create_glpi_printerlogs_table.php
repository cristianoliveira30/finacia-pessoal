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
        Schema::create('glpi_printerlogs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('printers_id');
            $table->integer('total_pages')->default(0);
            $table->integer('bw_pages')->default(0);
            $table->integer('color_pages')->default(0);
            $table->integer('rv_pages')->default(0);
            $table->integer('prints')->default(0);
            $table->integer('bw_prints')->default(0);
            $table->integer('color_prints')->default(0);
            $table->integer('copies')->default(0);
            $table->integer('bw_copies')->default(0);
            $table->integer('color_copies')->default(0);
            $table->integer('scanned')->default(0);
            $table->integer('faxed')->default(0);
            $table->date('date')->nullable()->index('date');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->timestamp('date_mod')->nullable()->index('date_mod');

            $table->unique(['printers_id', 'date'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_printerlogs');
    }
};
