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
        Schema::create('glpi_apiclients', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->string('name', 255)->nullable()->index('name');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->boolean('is_active')->default(false)->index('is_active');
            $table->bigInteger('ipv4_range_start')->nullable();
            $table->bigInteger('ipv4_range_end')->nullable();
            $table->string('ipv6', 255)->nullable();
            $table->string('app_token', 255)->nullable();
            $table->timestamp('app_token_date')->nullable();
            $table->tinyInteger('dolog_method')->default(0);
            $table->mediumText('comment')->nullable();
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_apiclients');
    }
};
