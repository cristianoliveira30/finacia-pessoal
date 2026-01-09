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
        Schema::create('glpi_appliancetypes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->tinyInteger('is_recursive')->default(0)->index('is_recursive');
            $table->string('name', 255)->default('')->index('name');
            $table->mediumText('comment')->nullable();
            $table->string('externalidentifier', 255)->nullable()->unique('externalidentifier');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_appliancetypes');
    }
};
