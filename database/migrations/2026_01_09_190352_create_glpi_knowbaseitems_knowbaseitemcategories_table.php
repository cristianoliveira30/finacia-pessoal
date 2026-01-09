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
        Schema::create('glpi_knowbaseitems_knowbaseitemcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('knowbaseitems_id')->default(0)->index('knowbaseitems_id');
            $table->unsignedInteger('knowbaseitemcategories_id')->default(0)->index('knowbaseitemcategories_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_knowbaseitems_knowbaseitemcategories');
    }
};
