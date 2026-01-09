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
        Schema::create('glpi_reminders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid', 255)->nullable()->unique('uuid');
            $table->timestamp('date')->nullable()->index('date');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->string('name', 255)->nullable()->index('name');
            $table->mediumText('text')->nullable();
            $table->timestamp('begin')->nullable()->index('begin');
            $table->timestamp('end')->nullable()->index('end');
            $table->boolean('is_planned')->default(false)->index('is_planned');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->integer('state')->default(0)->index('state');
            $table->timestamp('begin_view_date')->nullable();
            $table->timestamp('end_view_date')->nullable();
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_reminders');
    }
};
