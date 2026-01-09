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
        Schema::create('glpi_recurrentchanges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->mediumText('comment')->nullable();
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->tinyInteger('is_recursive')->default(0)->index('is_recursive');
            $table->tinyInteger('is_active')->default(0)->index('is_active');
            $table->unsignedInteger('changetemplates_id')->default(0)->index('changetemplates_id');
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
        Schema::dropIfExists('glpi_recurrentchanges');
    }
};
