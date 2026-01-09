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
        Schema::create('glpi_databases', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->tinyInteger('is_recursive')->default(0)->index('is_recursive');
            $table->string('name', 255)->default('')->index('name');
            $table->integer('size')->default(0);
            $table->unsignedInteger('databaseinstances_id')->default(0)->index('databaseinstances_id');
            $table->tinyInteger('is_onbackup')->default(0);
            $table->tinyInteger('is_active')->default(0)->index('is_active');
            $table->tinyInteger('is_deleted')->default(0)->index('is_deleted');
            $table->tinyInteger('is_dynamic')->default(0)->index('is_dynamic');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_update')->nullable();
            $table->timestamp('date_lastbackup')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_databases');
    }
};
