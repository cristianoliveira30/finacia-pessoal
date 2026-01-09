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
        Schema::create('glpi_ticketrecurrents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->mediumText('comment')->nullable();
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->boolean('is_active')->default(false)->index('is_active');
            $table->unsignedInteger('tickettemplates_id')->default(0)->index('tickettemplates_id');
            $table->timestamp('begin_date')->nullable();
            $table->string('periodicity', 255)->nullable();
            $table->integer('create_before')->default(0);
            $table->timestamp('next_creation_date')->nullable()->index('next_creation_date');
            $table->unsignedInteger('calendars_id')->default(0)->index('calendars_id');
            $table->timestamp('end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_ticketrecurrents');
    }
};
