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
        Schema::create('glpi_networkportaliases', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('networkports_id')->default(0)->unique('networkports_id');
            $table->unsignedInteger('networkports_id_alias')->default(0)->index('networkports_id_alias');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_networkportaliases');
    }
};
