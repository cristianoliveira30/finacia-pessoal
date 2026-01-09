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
        Schema::create('glpi_dropdowntranslations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('items_id')->default(0);
            $table->string('itemtype', 100)->nullable();
            $table->string('language', 10)->nullable()->index('language');
            $table->string('field', 100)->nullable()->index('field');
            $table->mediumText('value')->nullable();

            $table->unique(['itemtype', 'items_id', 'language', 'field'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_dropdowntranslations');
    }
};
