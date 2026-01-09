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
        Schema::create('glpi_fieldunicities', function (Blueprint $table) {
            $table->comment('Stores field unicity criterias');
            $table->increments('id');
            $table->string('name', 255)->default('')->index('name');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->string('itemtype', 255)->default('');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->mediumText('fields')->nullable();
            $table->boolean('is_active')->default(false)->index('is_active');
            $table->boolean('action_refuse')->default(false);
            $table->boolean('action_notify')->default(false);
            $table->mediumText('comment')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_fieldunicities');
    }
};
