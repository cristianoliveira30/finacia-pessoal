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
        Schema::create('glpi_knowbaseitemtranslations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('knowbaseitems_id')->default(0);
            $table->string('language', 10)->nullable();
            $table->mediumText('name')->nullable()->fulltext('name');
            $table->longText('answer')->nullable()->fulltext('answer');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');

            $table->fullText(['name', 'answer'], 'fulltext');
            $table->index(['knowbaseitems_id', 'language'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_knowbaseitemtranslations');
    }
};
