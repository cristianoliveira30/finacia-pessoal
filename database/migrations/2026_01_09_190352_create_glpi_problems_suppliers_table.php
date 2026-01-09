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
        Schema::create('glpi_problems_suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('problems_id')->default(0);
            $table->unsignedInteger('suppliers_id')->default(0);
            $table->integer('type')->default(1);
            $table->boolean('use_notification')->default(false);
            $table->string('alternative_email', 255)->nullable();

            $table->index(['suppliers_id', 'type'], 'group');
            $table->unique(['problems_id', 'type', 'suppliers_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_problems_suppliers');
    }
};
