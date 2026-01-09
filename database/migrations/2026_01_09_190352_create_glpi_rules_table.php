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
        Schema::create('glpi_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->string('sub_type', 255)->default('')->index('sub_type');
            $table->integer('ranking')->default(0);
            $table->string('name', 255)->nullable()->index('name');
            $table->mediumText('description')->nullable();
            $table->char('match', 10)->nullable()->comment('see define.php *_MATCHING constant');
            $table->boolean('is_active')->default(true)->index('is_active');
            $table->mediumText('comment')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->string('uuid', 255)->nullable();
            $table->integer('condition')->default(0)->index('condition');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_rules');
    }
};
