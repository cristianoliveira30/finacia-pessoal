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
        Schema::create('glpi_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->string('name', 255)->nullable()->index('name');
            $table->string('filename', 255)->nullable()->comment('for display and transfert');
            $table->string('filepath', 255)->nullable()->comment('file storage path');
            $table->unsignedInteger('documentcategories_id')->default(0)->index('documentcategories_id');
            $table->string('mime', 255)->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->mediumText('comment')->nullable();
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->string('link', 255)->nullable();
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->unsignedInteger('tickets_id')->default(0)->index('tickets_id');
            $table->char('sha1sum', 40)->nullable()->index('sha1sum');
            $table->boolean('is_blacklisted')->default(false);
            $table->string('tag', 255)->nullable()->index('tag');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_documents');
    }
};
