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
        Schema::create('glpi_mailcollectors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->string('host', 255)->nullable();
            $table->string('login', 255)->nullable();
            $table->integer('filesize_max')->default(2097152);
            $table->boolean('is_active')->default(true)->index('is_active');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->mediumText('comment')->nullable();
            $table->string('passwd', 255)->nullable();
            $table->string('accepted', 255)->nullable();
            $table->string('refused', 255)->nullable();
            $table->integer('errors')->default(0);
            $table->boolean('use_mail_date')->default(false);
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->integer('requester_field')->default(0);
            $table->tinyInteger('add_cc_to_observer')->default(0);
            $table->tinyInteger('collect_only_unread')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_mailcollectors');
    }
};
