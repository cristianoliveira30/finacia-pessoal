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
        Schema::create('glpi_dashboards_dashboards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key', 100)->unique('key');
            $table->string('name', 100)->index('name');
            $table->string('context', 100)->default('core');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_dashboards_dashboards');
    }
};
