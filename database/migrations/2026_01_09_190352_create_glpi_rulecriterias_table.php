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
        Schema::create('glpi_rulecriterias', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rules_id')->default(0)->index('rules_id');
            $table->string('criteria', 255)->nullable();
            $table->integer('condition')->default(0)->index('condition')->comment('see define.php PATTERN_* and REGEX_* constant');
            $table->mediumText('pattern')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_rulecriterias');
    }
};
