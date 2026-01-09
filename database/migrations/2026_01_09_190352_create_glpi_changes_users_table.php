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
        Schema::create('glpi_changes_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('changes_id')->default(0);
            $table->unsignedInteger('users_id')->default(0);
            $table->integer('type')->default(1);
            $table->boolean('use_notification')->default(false);
            $table->string('alternative_email', 255)->nullable();

            $table->unique(['changes_id', 'type', 'users_id', 'alternative_email'], 'unicity');
            $table->index(['users_id', 'type'], 'user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_changes_users');
    }
};
