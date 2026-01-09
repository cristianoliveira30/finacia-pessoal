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
        Schema::create('glpi_tickets_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tickets_id')->default(0);
            $table->unsignedInteger('users_id')->default(0);
            $table->integer('type')->default(1);
            $table->boolean('use_notification')->default(true);
            $table->string('alternative_email', 255)->nullable();

            $table->unique(['tickets_id', 'type', 'users_id', 'alternative_email'], 'unicity');
            $table->index(['users_id', 'type'], 'user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_tickets_users');
    }
};
