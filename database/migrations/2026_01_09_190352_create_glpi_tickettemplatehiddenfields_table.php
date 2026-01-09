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
        Schema::create('glpi_tickettemplatehiddenfields', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tickettemplates_id')->default(0);
            $table->integer('num')->default(0);

            $table->unique(['tickettemplates_id', 'num'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_tickettemplatehiddenfields');
    }
};
