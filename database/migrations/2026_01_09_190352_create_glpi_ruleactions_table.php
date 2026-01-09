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
        Schema::create('glpi_ruleactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rules_id')->default(0)->index('rules_id');
            $table->string('action_type', 255)->nullable()->comment('VALUE IN (assign, regex_result, append_regex_result, affectbyip, affectbyfqdn, affectbymac)');
            $table->string('field', 255)->nullable();
            $table->string('value', 255)->nullable();

            $table->index(['field', 'value'], 'field_value');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_ruleactions');
    }
};
