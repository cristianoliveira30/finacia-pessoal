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
        Schema::create('glpi_authldapreplicates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('authldaps_id')->default(0)->index('authldaps_id');
            $table->string('host', 255)->nullable();
            $table->integer('port')->default(389);
            $table->string('name', 255)->nullable()->index('name');
            $table->integer('timeout')->default(10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_authldapreplicates');
    }
};
