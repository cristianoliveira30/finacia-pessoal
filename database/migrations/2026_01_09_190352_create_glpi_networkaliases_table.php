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
        Schema::create('glpi_networkaliases', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->unsignedInteger('networknames_id')->default(0)->index('networknames_id');
            $table->string('name', 255)->nullable()->index('name');
            $table->unsignedInteger('fqdns_id')->default(0)->index('fqdns_id');
            $table->mediumText('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_networkaliases');
    }
};
