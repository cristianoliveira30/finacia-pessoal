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
        Schema::create('glpi_ipaddresses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->unsignedInteger('items_id')->default(0);
            $table->string('itemtype', 100);
            $table->unsignedTinyInteger('version')->nullable()->default(0);
            $table->string('name', 255)->nullable()->index('name');
            $table->unsignedInteger('binary_0')->default(0);
            $table->unsignedInteger('binary_1')->default(0);
            $table->unsignedInteger('binary_2')->default(0);
            $table->unsignedInteger('binary_3')->default(0);
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->boolean('is_dynamic')->default(false)->index('is_dynamic');
            $table->unsignedInteger('mainitems_id')->default(0);
            $table->string('mainitemtype', 255)->nullable();

            $table->index(['binary_0', 'binary_1', 'binary_2', 'binary_3'], 'binary');
            $table->index(['itemtype', 'items_id', 'is_deleted'], 'item');
            $table->index(['mainitemtype', 'mainitems_id', 'is_deleted'], 'mainitem');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_ipaddresses');
    }
};
