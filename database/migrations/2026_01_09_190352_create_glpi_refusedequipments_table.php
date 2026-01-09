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
        Schema::create('glpi_refusedequipments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->string('itemtype', 100)->nullable();
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->string('ip', 255)->nullable();
            $table->string('mac', 255)->nullable();
            $table->unsignedInteger('rules_id')->default(0)->index('rules_id');
            $table->string('method', 255)->nullable();
            $table->string('serial', 255)->nullable();
            $table->string('uuid', 255)->nullable();
            $table->unsignedInteger('agents_id')->default(0)->index('agents_id');
            $table->unsignedInteger('autoupdatesystems_id')->default(0)->index('autoupdatesystems_id');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_refusedequipments');
    }
};
