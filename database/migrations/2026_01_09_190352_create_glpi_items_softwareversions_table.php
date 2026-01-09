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
        Schema::create('glpi_items_softwareversions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('items_id')->default(0);
            $table->string('itemtype', 100);
            $table->unsignedInteger('softwareversions_id')->default(0)->index('softwareversions_id');
            $table->tinyInteger('is_deleted_item')->default(0)->index('is_deleted_item');
            $table->tinyInteger('is_template_item')->default(0)->index('is_template_item');
            $table->unsignedInteger('entities_id')->default(0);
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->boolean('is_dynamic')->default(false)->index('is_dynamic');
            $table->date('date_install')->nullable()->index('date_install');

            $table->index(['entities_id', 'is_template_item', 'is_deleted_item'], 'computers_info');
            $table->unique(['itemtype', 'items_id', 'softwareversions_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_items_softwareversions');
    }
};
