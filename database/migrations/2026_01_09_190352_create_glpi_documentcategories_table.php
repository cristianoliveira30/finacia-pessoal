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
        Schema::create('glpi_documentcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->mediumText('comment')->nullable();
            $table->unsignedInteger('documentcategories_id')->default(0);
            $table->mediumText('completename')->nullable();
            $table->integer('level')->default(0)->index('level');
            $table->longText('ancestors_cache')->nullable();
            $table->longText('sons_cache')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');

            $table->unique(['documentcategories_id', 'name'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_documentcategories');
    }
};
