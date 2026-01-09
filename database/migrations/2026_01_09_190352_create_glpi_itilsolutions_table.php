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
        Schema::create('glpi_itilsolutions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemtype', 100);
            $table->unsignedInteger('items_id')->default(0);
            $table->unsignedInteger('solutiontypes_id')->default(0)->index('solutiontypes_id');
            $table->string('solutiontype_name', 255)->nullable();
            $table->longText('content')->nullable();
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_approval')->nullable();
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->string('user_name', 255)->nullable();
            $table->unsignedInteger('users_id_editor')->default(0)->index('users_id_editor');
            $table->unsignedInteger('users_id_approval')->default(0)->index('users_id_approval');
            $table->string('user_name_approval', 255)->nullable();
            $table->integer('status')->default(1)->index('status');
            $table->unsignedInteger('itilfollowups_id')->nullable()->index('itilfollowups_id');

            $table->index(['itemtype', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_itilsolutions');
    }
};
