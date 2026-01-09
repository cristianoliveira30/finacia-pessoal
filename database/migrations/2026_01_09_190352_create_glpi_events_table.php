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
        Schema::create('glpi_events', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('items_id')->default(0);
            $table->string('type', 255)->nullable();
            $table->timestamp('date')->nullable()->index('date');
            $table->string('service', 255)->nullable();
            $table->integer('level')->default(0)->index('level');
            $table->mediumText('message')->nullable();

            $table->index(['type', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_events');
    }
};
