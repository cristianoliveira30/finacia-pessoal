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
        Schema::create('glpi_networkequipmentmodels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->mediumText('comment')->nullable();
            $table->string('product_number', 255)->nullable()->index('product_number');
            $table->integer('weight')->default(0);
            $table->integer('required_units')->default(1);
            $table->float('depth')->default(1);
            $table->integer('power_connections')->default(0);
            $table->integer('power_consumption')->default(0);
            $table->boolean('is_half_rack')->default(false);
            $table->mediumText('picture_front')->nullable();
            $table->mediumText('picture_rear')->nullable();
            $table->mediumText('pictures')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_networkequipmentmodels');
    }
};
