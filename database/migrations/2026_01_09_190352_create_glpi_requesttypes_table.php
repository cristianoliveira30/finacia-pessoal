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
        Schema::create('glpi_requesttypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->boolean('is_helpdesk_default')->default(false)->index('is_helpdesk_default');
            $table->boolean('is_followup_default')->default(false)->index('is_followup_default');
            $table->boolean('is_mail_default')->default(false)->index('is_mail_default');
            $table->boolean('is_mailfollowup_default')->default(false)->index('is_mailfollowup_default');
            $table->boolean('is_active')->default(true)->index('is_active');
            $table->boolean('is_ticketheader')->default(true)->index('is_ticketheader');
            $table->boolean('is_itilfollowup')->default(true)->index('is_itilfollowup');
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
        Schema::dropIfExists('glpi_requesttypes');
    }
};
