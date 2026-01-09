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
        Schema::create('glpi_consumableitems', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->string('name', 255)->nullable()->index('name');
            $table->string('ref', 255)->nullable();
            $table->unsignedInteger('locations_id')->default(0)->index('locations_id');
            $table->unsignedInteger('consumableitemtypes_id')->default(0)->index('consumableitemtypes_id');
            $table->unsignedInteger('manufacturers_id')->default(0)->index('manufacturers_id');
            $table->unsignedInteger('users_id_tech')->default(0)->index('users_id_tech');
            $table->unsignedInteger('groups_id_tech')->default(0)->index('groups_id_tech');
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->mediumText('comment')->nullable();
            $table->integer('alarm_threshold')->default(10)->index('alarm_threshold');
            $table->integer('stock_target')->default(0);
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->string('otherserial', 255)->nullable()->index('otherserial');
            $table->mediumText('pictures')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_consumableitems');
    }
};
