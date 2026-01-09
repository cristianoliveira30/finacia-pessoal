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
        Schema::create('glpi_lineoperators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->default('')->index('name');
            $table->mediumText('comment')->nullable();
            $table->integer('mcc')->nullable();
            $table->integer('mnc')->nullable();
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');

            $table->unique(['mcc', 'mnc'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_lineoperators');
    }
};
