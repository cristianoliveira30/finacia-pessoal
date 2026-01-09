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
        Schema::create('glpi_savedsearches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->integer('type')->default(0)->index('type')->comment('see SavedSearch:: constants');
            $table->string('itemtype', 100)->index('itemtype');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->boolean('is_private')->default(true)->index('is_private');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->mediumText('query')->nullable();
            $table->integer('last_execution_time')->nullable()->index('last_execution_time');
            $table->boolean('do_count')->default(false)->index('do_count')->comment('Do or do not count results on list display see SavedSearch::COUNT_* constants');
            $table->timestamp('last_execution_date')->nullable()->index('last_execution_date');
            $table->integer('counter')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_savedsearches');
    }
};
