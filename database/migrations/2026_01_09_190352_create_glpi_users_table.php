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
        Schema::create('glpi_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('password', 255)->nullable();
            $table->timestamp('password_last_update')->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('phone2', 255)->nullable();
            $table->string('mobile', 255)->nullable();
            $table->string('realname', 255)->nullable()->index('realname');
            $table->string('firstname', 255)->nullable()->index('firstname');
            $table->unsignedInteger('locations_id')->default(0)->index('locations_id');
            $table->char('language', 10)->nullable()->comment('see define.php CFG_GLPI[language] array');
            $table->integer('use_mode')->default(0);
            $table->integer('list_limit')->nullable();
            $table->boolean('is_active')->default(true)->index('is_active');
            $table->mediumText('comment')->nullable();
            $table->unsignedInteger('auths_id')->default(0)->index('auths_id');
            $table->integer('authtype')->default(0);
            $table->timestamp('last_login')->nullable();
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_sync')->nullable();
            $table->boolean('is_deleted')->default(false)->index('is_deleted');
            $table->unsignedInteger('profiles_id')->default(0)->index('profiles_id');
            $table->unsignedInteger('entities_id')->default(0)->index('entities_id');
            $table->unsignedInteger('usertitles_id')->default(0)->index('usertitles_id');
            $table->unsignedInteger('usercategories_id')->default(0)->index('usercategories_id');
            $table->integer('date_format')->nullable();
            $table->integer('number_format')->nullable();
            $table->integer('names_format')->nullable();
            $table->char('csv_delimiter', 1)->nullable();
            $table->boolean('is_ids_visible')->nullable();
            $table->boolean('use_flat_dropdowntree')->nullable();
            $table->boolean('show_jobs_at_login')->nullable();
            $table->char('priority_1', 20)->nullable();
            $table->char('priority_2', 20)->nullable();
            $table->char('priority_3', 20)->nullable();
            $table->char('priority_4', 20)->nullable();
            $table->char('priority_5', 20)->nullable();
            $table->char('priority_6', 20)->nullable();
            $table->boolean('followup_private')->nullable();
            $table->boolean('task_private')->nullable();
            $table->unsignedInteger('default_requesttypes_id')->nullable()->index('default_requesttypes_id');
            $table->char('password_forget_token', 40)->nullable();
            $table->timestamp('password_forget_token_date')->nullable();
            $table->mediumText('user_dn')->nullable();
            $table->string('registration_number', 255)->nullable();
            $table->boolean('show_count_on_tabs')->nullable();
            $table->integer('refresh_views')->nullable();
            $table->boolean('set_default_tech')->nullable();
            $table->string('personal_token', 255)->nullable();
            $table->timestamp('personal_token_date')->nullable();
            $table->string('api_token', 255)->nullable();
            $table->timestamp('api_token_date')->nullable();
            $table->string('cookie_token', 255)->nullable();
            $table->timestamp('cookie_token_date')->nullable();
            $table->integer('display_count_on_home')->nullable();
            $table->boolean('notification_to_myself')->nullable();
            $table->string('duedateok_color', 255)->nullable();
            $table->string('duedatewarning_color', 255)->nullable();
            $table->string('duedatecritical_color', 255)->nullable();
            $table->integer('duedatewarning_less')->nullable();
            $table->integer('duedatecritical_less')->nullable();
            $table->string('duedatewarning_unit', 255)->nullable();
            $table->string('duedatecritical_unit', 255)->nullable();
            $table->mediumText('display_options')->nullable();
            $table->boolean('is_deleted_ldap')->default(false)->index('is_deleted_ldap');
            $table->string('pdffont', 255)->nullable();
            $table->string('picture', 255)->nullable();
            $table->timestamp('begin_date')->nullable()->index('begin_date');
            $table->timestamp('end_date')->nullable()->index('end_date');
            $table->boolean('keep_devices_when_purging_item')->nullable();
            $table->longText('privatebookmarkorder')->nullable();
            $table->boolean('backcreated')->nullable();
            $table->integer('task_state')->nullable();
            $table->char('palette', 20)->nullable();
            $table->char('page_layout', 20)->nullable();
            $table->tinyInteger('fold_menu')->nullable();
            $table->tinyInteger('fold_search')->nullable();
            $table->mediumText('savedsearches_pinned')->nullable();
            $table->char('timeline_order', 20)->nullable();
            $table->mediumText('itil_layout')->nullable();
            $table->char('richtext_layout', 20)->nullable();
            $table->boolean('set_default_requester')->nullable();
            $table->boolean('lock_autolock_mode')->nullable();
            $table->boolean('lock_directunlock_notification')->nullable();
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->boolean('highcontrast_css')->nullable()->default(false);
            $table->mediumText('plannings')->nullable();
            $table->string('sync_field', 255)->nullable()->index('sync_field');
            $table->unsignedInteger('groups_id')->default(0)->index('groups_id');
            $table->unsignedInteger('users_id_supervisor')->default(0)->index('users_id_supervisor');
            $table->string('timezone', 50)->nullable();
            $table->string('default_dashboard_central', 100)->nullable();
            $table->string('default_dashboard_assets', 100)->nullable();
            $table->string('default_dashboard_helpdesk', 100)->nullable();
            $table->string('default_dashboard_mini_ticket', 100)->nullable();
            $table->tinyInteger('default_central_tab')->nullable()->default(0);
            $table->string('nickname', 255)->nullable();
            $table->tinyInteger('timeline_action_btn_layout')->nullable()->default(0);
            $table->tinyInteger('timeline_date_format')->nullable()->default(0);
            $table->tinyInteger('use_flat_dropdowntree_on_search_result')->nullable();

            $table->index(['authtype', 'auths_id'], 'authitem');
            $table->unique(['name', 'authtype', 'auths_id'], 'unicityloginauth');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_users');
    }
};
