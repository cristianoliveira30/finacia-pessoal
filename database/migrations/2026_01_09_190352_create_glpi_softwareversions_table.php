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
        Schema::create('glpi_softwareversions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->unsignedInteger('softwares_id')->default(0)->index('softwares_id');
            $table->unsignedInteger('states_id')->default(0)->index('states_id');
            $table->string('name', 255)->nullable()->index('name');
            $table->string('arch', 255)->nullable()->index('arch');
            $table->mediumText('comment')->nullable();
            $table->unsignedInteger('operatingsystems_id')->default(0)->index('operatingsystems_id');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_softwareversions');
    }
};
