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
        Schema::create('glpi_domains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->unsignedInteger('domaintypes_id')->default(0)->index('domaintypes_id');
            $table->timestamp('date_expiration')->nullable()->index('date_expiration');
            $table->timestamp('date_domaincreation')->nullable()->index('date_domaincreation');
            $table->unsignedInteger('users_id_tech')->default(0)->index('users_id_tech');
            $table->unsignedInteger('groups_id_tech')->default(0)->index('groups_id_tech');
            $table->tinyInteger('is_deleted')->default(0)->index('is_deleted');
            $table->mediumText('comment')->nullable();
            $table->tinyInteger('is_template')->default(0)->index('is_template');
            $table->string('template_name', 255)->nullable();
            $table->tinyInteger('is_active')->default(0)->index('is_active');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_domains');
    }
};
