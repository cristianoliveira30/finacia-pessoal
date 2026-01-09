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
        Schema::create('glpi_pdus_racks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('racks_id')->default(0)->index('racks_id');
            $table->unsignedInteger('pdus_id')->default(0)->index('pdus_id');
            $table->integer('side')->nullable()->default(0);
            $table->integer('position');
            $table->string('bgcolor', 7)->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_pdus_racks');
    }
};
