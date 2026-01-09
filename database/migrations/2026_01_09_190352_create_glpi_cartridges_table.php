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
        Schema::create('glpi_cartridges', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->unsignedInteger('cartridgeitems_id')->default(0)->index('cartridgeitems_id');
            $table->unsignedInteger('printers_id')->default(0)->index('printers_id');
            $table->date('date_in')->nullable();
            $table->date('date_use')->nullable();
            $table->date('date_out')->nullable();
            $table->integer('pages')->default(0);
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_cartridges');
    }
};
