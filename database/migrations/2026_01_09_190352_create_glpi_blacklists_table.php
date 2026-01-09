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
        Schema::create('glpi_blacklists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->default(0)->index('type');
            $table->string('name', 255)->nullable()->index('name');
            $table->string('value', 255)->nullable();
            $table->mediumText('comment')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_blacklists');
    }
};
