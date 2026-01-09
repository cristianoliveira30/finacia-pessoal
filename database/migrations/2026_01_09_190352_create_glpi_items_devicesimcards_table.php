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
        Schema::create('glpi_items_devicesimcards', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('items_id')->default(0);
            $table->string('itemtype', 100);
            $table->unsignedInteger('devicesimcards_id')->default(0)->index('devicesimcards_id');
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->boolean('is_dynamic')->default(false)->index('is_dynamic');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->string('serial', 255)->nullable()->index('serial');
            $table->string('otherserial', 255)->nullable()->index('otherserial');
            $table->unsignedInteger('states_id')->default(0)->index('states_id');
            $table->unsignedInteger('locations_id')->default(0)->index('locations_id');
            $table->unsignedInteger('lines_id')->default(0)->index('lines_id');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->unsignedInteger('groups_id')->default(0)->index('groups_id');
            $table->string('pin', 255)->default('');
            $table->string('pin2', 255)->default('');
            $table->string('puk', 255)->default('');
            $table->string('puk2', 255)->default('');
            $table->string('msin', 255)->default('');
            $table->mediumText('comment')->nullable();

            $table->index(['itemtype', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_items_devicesimcards');
    }
};
