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
        Schema::create('glpi_tasktemplates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->string('name', 255)->nullable()->index('name');
            $table->mediumText('content')->nullable();
            $table->unsignedInteger('taskcategories_id')->default(0)->index('taskcategories_id');
            $table->integer('actiontime')->default(0);
            $table->mediumText('comment')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->integer('state')->default(0);
            $table->boolean('is_private')->default(false)->index('is_private');
            $table->unsignedInteger('users_id_tech')->default(0)->index('users_id_tech');
            $table->unsignedInteger('groups_id_tech')->default(0)->index('groups_id_tech');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_tasktemplates');
    }
};
