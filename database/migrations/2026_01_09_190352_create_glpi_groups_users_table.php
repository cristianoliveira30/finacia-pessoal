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
        Schema::create('glpi_groups_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('users_id')->default(0);
            $table->unsignedInteger('groups_id')->default(0)->index('groups_id');
            $table->boolean('is_dynamic')->default(false)->index('is_dynamic');
            $table->boolean('is_manager')->default(false)->index('is_manager');
            $table->boolean('is_userdelegate')->default(false)->index('is_userdelegate');

            $table->unique(['users_id', 'groups_id'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_groups_users');
    }
};
