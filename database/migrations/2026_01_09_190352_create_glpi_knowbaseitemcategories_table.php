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
        Schema::create('glpi_knowbaseitemcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0);
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->unsignedInteger('knowbaseitemcategories_id')->default(0)->index('knowbaseitemcategories_id');
            $table->string('name', 255)->nullable()->index('name');
            $table->mediumText('completename')->nullable();
            $table->mediumText('comment')->nullable();
            $table->integer('level')->default(0)->index('level');
            $table->longText('sons_cache')->nullable();
            $table->longText('ancestors_cache')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');

            $table->unique(['entities_id', 'knowbaseitemcategories_id', 'name'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_knowbaseitemcategories');
    }
};
