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
        Schema::create('glpi_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->boolean('is_recursive')->default(false)->index('is_recursive');
            $table->string('name', 255)->nullable()->index('name');
            $table->mediumText('comment')->nullable();
            $table->string('ldap_field', 255)->nullable()->index('ldap_field');
            $table->mediumText('ldap_value')->nullable()->index('ldap_value');
            $table->mediumText('ldap_group_dn')->nullable()->index('ldap_group_dn');
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->unsignedInteger('groups_id')->default(0)->index('groups_id');
            $table->mediumText('completename')->nullable();
            $table->integer('level')->default(0)->index('level');
            $table->longText('ancestors_cache')->nullable();
            $table->longText('sons_cache')->nullable();
            $table->boolean('is_requester')->default(true)->index('is_requester');
            $table->boolean('is_watcher')->default(true)->index('is_watcher');
            $table->boolean('is_assign')->default(true)->index('is_assign');
            $table->boolean('is_task')->default(true);
            $table->boolean('is_notify')->default(true)->index('is_notify');
            $table->boolean('is_itemgroup')->default(true)->index('is_itemgroup');
            $table->boolean('is_usergroup')->default(true)->index('is_usergroup');
            $table->boolean('is_manager')->default(true)->index('is_manager');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_groups');
    }
};
