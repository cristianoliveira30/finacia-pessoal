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
        Schema::create('glpi_pendingreasons', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->tinyInteger('is_recursive')->default(0)->index('is_recursive');
            $table->string('name', 255)->nullable()->index('name');
            $table->integer('followup_frequency')->default(0);
            $table->integer('followups_before_resolution')->default(0);
            $table->unsignedInteger('itilfollowuptemplates_id')->default(0)->index('itilfollowuptemplates_id');
            $table->unsignedInteger('solutiontemplates_id')->default(0)->index('solutiontemplates_id');
            $table->mediumText('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_pendingreasons');
    }
};
