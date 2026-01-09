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
        Schema::create('glpi_snmpcredentials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64)->nullable()->index('name');
            $table->string('snmpversion', 8)->default('1')->index('snmpversion');
            $table->string('community', 255)->nullable();
            $table->string('username', 255)->nullable();
            $table->string('authentication', 255)->nullable();
            $table->string('auth_passphrase', 255)->nullable();
            $table->string('encryption', 255)->nullable();
            $table->string('priv_passphrase', 255)->nullable();
            $table->tinyInteger('is_deleted')->default(0)->index('is_deleted');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_snmpcredentials');
    }
};
