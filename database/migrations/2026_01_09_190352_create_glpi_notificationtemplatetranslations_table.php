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
        Schema::create('glpi_notificationtemplatetranslations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('notificationtemplates_id')->default(0)->index('notificationtemplates_id');
            $table->string('language', 10)->default('');
            $table->string('subject', 255);
            $table->mediumText('content_text')->nullable();
            $table->mediumText('content_html')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_notificationtemplatetranslations');
    }
};
