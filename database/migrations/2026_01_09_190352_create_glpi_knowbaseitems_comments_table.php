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
        Schema::create('glpi_knowbaseitems_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('knowbaseitems_id')->index('knowbaseitems_id');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->string('language', 10)->nullable();
            $table->mediumText('comment')->nullable();
            $table->unsignedInteger('parent_comment_id')->nullable()->index('parent_comment_id');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_knowbaseitems_comments');
    }
};
