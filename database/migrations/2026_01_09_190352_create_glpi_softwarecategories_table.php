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
        Schema::create('glpi_softwarecategories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->mediumText('comment')->nullable();
            $table->unsignedInteger('softwarecategories_id')->default(0)->index('softwarecategories_id');
            $table->mediumText('completename')->nullable();
            $table->integer('level')->default(0)->index('level');
            $table->longText('ancestors_cache')->nullable();
            $table->longText('sons_cache')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_softwarecategories');
    }
};
