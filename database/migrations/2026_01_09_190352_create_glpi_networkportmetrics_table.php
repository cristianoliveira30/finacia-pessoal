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
        Schema::create('glpi_networkportmetrics', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable()->index('date');
            $table->bigInteger('ifinbytes')->default(0);
            $table->bigInteger('ifinerrors')->default(0);
            $table->bigInteger('ifoutbytes')->default(0);
            $table->bigInteger('ifouterrors')->default(0);
            $table->unsignedInteger('networkports_id')->default(0);
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->timestamp('date_mod')->nullable()->index('date_mod');

            $table->unique(['networkports_id', 'date'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_networkportmetrics');
    }
};
