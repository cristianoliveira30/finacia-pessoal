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
        Schema::create('glpi_changetemplatepredefinedfields', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('changetemplates_id')->default(0)->index('changetemplates_id');
            $table->integer('num')->default(0);
            $table->mediumText('value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_changetemplatepredefinedfields');
    }
};
