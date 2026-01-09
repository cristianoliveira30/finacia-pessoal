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
        Schema::create('glpi_savedsearches_alerts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('savedsearches_id')->default(0);
            $table->string('name', 255)->nullable()->index('name');
            $table->boolean('is_active')->default(false)->index('is_active');
            $table->boolean('operator');
            $table->integer('value');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->integer('frequency')->default(0);

            $table->unique(['savedsearches_id', 'operator', 'value'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_savedsearches_alerts');
    }
};
