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
        Schema::create('glpi_devicebatteries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('designation', 255)->nullable()->index('designation');
            $table->mediumText('comment')->nullable();
            $table->unsignedInteger('manufacturers_id')->default(0)->index('manufacturers_id');
            $table->integer('voltage')->nullable();
            $table->integer('capacity')->nullable();
            $table->unsignedInteger('devicebatterytypes_id')->default(0)->index('devicebatterytypes_id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->unsignedInteger('devicebatterymodels_id')->nullable()->index('devicebatterymodels_id');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_devicebatteries');
    }
};
