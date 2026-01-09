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
        Schema::create('glpi_items_operatingsystems', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('items_id')->default(0);
            $table->string('itemtype', 255)->nullable();
            $table->unsignedInteger('operatingsystems_id')->default(0)->index('operatingsystems_id');
            $table->unsignedInteger('operatingsystemversions_id')->default(0)->index('operatingsystemversions_id');
            $table->unsignedInteger('operatingsystemservicepacks_id')->default(0)->index('operatingsystemservicepacks_id');
            $table->unsignedInteger('operatingsystemarchitectures_id')->default(0)->index('operatingsystemarchitectures_id');
            $table->unsignedInteger('operatingsystemkernelversions_id')->default(0)->index('operatingsystemkernelversions_id');
            $table->string('license_number', 255)->nullable();
            $table->string('licenseid', 255)->nullable();
            $table->unsignedInteger('operatingsystemeditions_id')->default(0)->index('operatingsystemeditions_id');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->boolean('is_dynamic')->default(false)->index('is_dynamic');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->date('install_date')->nullable();

            $table->index(['itemtype', 'items_id'], 'item');
            $table->unique(['items_id', 'itemtype', 'operatingsystems_id', 'operatingsystemarchitectures_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_items_operatingsystems');
    }
};
