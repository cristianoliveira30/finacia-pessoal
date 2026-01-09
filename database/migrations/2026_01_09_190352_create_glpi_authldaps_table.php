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
        Schema::create('glpi_authldaps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->index('name');
            $table->string('host', 255)->nullable();
            $table->string('basedn', 255)->nullable();
            $table->string('rootdn', 255)->nullable();
            $table->integer('port')->default(389);
            $table->mediumText('condition')->nullable();
            $table->string('login_field', 255)->nullable()->default('uid');
            $table->string('sync_field', 255)->nullable()->index('sync_field');
            $table->boolean('use_tls')->default(false);
            $table->string('group_field', 255)->nullable();
            $table->mediumText('group_condition')->nullable();
            $table->integer('group_search_type')->default(0);
            $table->string('group_member_field', 255)->nullable();
            $table->string('email1_field', 255)->nullable();
            $table->string('realname_field', 255)->nullable();
            $table->string('firstname_field', 255)->nullable();
            $table->string('phone_field', 255)->nullable();
            $table->string('phone2_field', 255)->nullable();
            $table->string('mobile_field', 255)->nullable();
            $table->string('comment_field', 255)->nullable();
            $table->boolean('use_dn')->default(true);
            $table->integer('time_offset')->default(0)->comment('in seconds');
            $table->integer('deref_option')->default(0);
            $table->string('title_field', 255)->nullable();
            $table->string('category_field', 255)->nullable();
            $table->string('language_field', 255)->nullable();
            $table->string('entity_field', 255)->nullable();
            $table->mediumText('entity_condition')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->mediumText('comment')->nullable();
            $table->boolean('is_default')->default(false)->index('is_default');
            $table->boolean('is_active')->default(false)->index('is_active');
            $table->string('rootdn_passwd', 255)->nullable();
            $table->string('registration_number_field', 255)->nullable();
            $table->string('email2_field', 255)->nullable();
            $table->string('email3_field', 255)->nullable();
            $table->string('email4_field', 255)->nullable();
            $table->string('location_field', 255)->nullable();
            $table->string('responsible_field', 255)->nullable();
            $table->integer('pagesize')->default(0);
            $table->integer('ldap_maxlimit')->default(0);
            $table->boolean('can_support_pagesize')->default(false);
            $table->string('picture_field', 255)->nullable();
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->string('inventory_domain', 255)->nullable();
            $table->mediumText('tls_certfile')->nullable();
            $table->mediumText('tls_keyfile')->nullable();
            $table->tinyInteger('use_bind')->default(1);
            $table->integer('timeout')->default(10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_authldaps');
    }
};
