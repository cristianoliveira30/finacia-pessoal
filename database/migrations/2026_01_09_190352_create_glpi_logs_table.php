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
        Schema::create('glpi_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemtype', 100)->default('');
            $table->unsignedInteger('items_id')->default(0);
            $table->string('itemtype_link', 100)->default('')->index('itemtype_link');
            $table->integer('linked_action')->default(0)->comment('see define.php HISTORY_* constant');
            $table->string('user_name', 255)->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->integer('id_search_option')->default(0)->index('id_search_option')->comment('see search.constant.php for value');
            $table->string('old_value', 255)->nullable();
            $table->string('new_value', 255)->nullable();

            $table->index(['itemtype', 'items_id'], 'item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_logs');
    }
};
