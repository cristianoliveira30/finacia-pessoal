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
        Schema::create('glpi_imageformats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->unique('unicity');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->mediumText('comment')->nullable();
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->tinyInteger('is_recursive')->default(0)->index('is_recursive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_imageformats');
    }
};
