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
        Schema::create('glpi_entities', function (Blueprint $table) {
            $table->unsignedInteger('id')->default(0)->primary();
            $table->string('name', 255)->nullable()->index('name');
            $table->unsignedInteger('entities_id')->nullable()->default(0);
            $table->mediumText('completename')->nullable();
            $table->mediumText('comment')->nullable();
            $table->integer('level')->default(0)->index('level');
            $table->longText('sons_cache')->nullable();
            $table->longText('ancestors_cache')->nullable();
            $table->string('registration_number', 255)->nullable();
            $table->mediumText('address')->nullable();
            $table->string('postcode', 255)->nullable();
            $table->string('town', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('website', 255)->nullable();
            $table->string('phonenumber', 255)->nullable();
            $table->string('fax', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('admin_email', 255)->nullable();
            $table->string('admin_email_name', 255)->nullable();
            $table->string('replyto_email', 255)->nullable();
            $table->string('replyto_email_name', 255)->nullable();
            $table->string('notification_subject_tag', 255)->nullable();
            $table->string('ldap_dn', 255)->nullable();
            $table->string('tag', 255)->nullable();
            $table->unsignedInteger('authldaps_id')->default(0)->index('authldaps_id');
            $table->string('mail_domain', 255)->nullable();
            $table->mediumText('entity_ldapfilter')->nullable();
            $table->mediumText('mailing_signature')->nullable();
            $table->integer('cartridges_alert_repeat')->default(-2);
            $table->integer('consumables_alert_repeat')->default(-2);
            $table->integer('use_licenses_alert')->default(-2);
            $table->integer('send_licenses_alert_before_delay')->default(-2);
            $table->integer('use_certificates_alert')->default(-2);
            $table->integer('send_certificates_alert_before_delay')->default(-2);
            $table->integer('certificates_alert_repeat_interval')->default(-2);
            $table->integer('use_contracts_alert')->default(-2);
            $table->integer('send_contracts_alert_before_delay')->default(-2);
            $table->integer('use_infocoms_alert')->default(-2);
            $table->integer('send_infocoms_alert_before_delay')->default(-2);
            $table->integer('use_reservations_alert')->default(-2);
            $table->integer('use_domains_alert')->default(-2);
            $table->integer('send_domains_alert_close_expiries_delay')->default(-2);
            $table->integer('send_domains_alert_expired_delay')->default(-2);
            $table->integer('autoclose_delay')->default(-2);
            $table->integer('autopurge_delay')->default(-10);
            $table->integer('notclosed_delay')->default(-2);
            $table->unsignedInteger('calendars_id')->default(0)->index('calendars_id');
            $table->integer('auto_assign_mode')->default(-2);
            $table->integer('tickettype')->default(-2);
            $table->timestamp('max_closedate')->nullable();
            $table->integer('inquest_config')->default(-2);
            $table->integer('inquest_rate')->default(0);
            $table->integer('inquest_delay')->default(-10);
            $table->string('inquest_URL', 255)->nullable();
            $table->string('autofill_warranty_date', 255)->default('-2');
            $table->string('autofill_use_date', 255)->default('-2');
            $table->string('autofill_buy_date', 255)->default('-2');
            $table->string('autofill_delivery_date', 255)->default('-2');
            $table->string('autofill_order_date', 255)->default('-2');
            $table->unsignedInteger('tickettemplates_id')->default(0)->index('tickettemplates_id');
            $table->unsignedInteger('changetemplates_id')->default(0)->index('changetemplates_id');
            $table->unsignedInteger('problemtemplates_id')->default(0)->index('problemtemplates_id');
            $table->unsignedInteger('entities_id_software')->default(0)->index('entities_id_software');
            $table->integer('default_contract_alert')->default(-2);
            $table->integer('default_infocom_alert')->default(-2);
            $table->integer('default_cartridges_alarm_threshold')->default(-2);
            $table->integer('default_consumables_alarm_threshold')->default(-2);
            $table->integer('delay_send_emails')->default(-2);
            $table->integer('is_notif_enable_default')->default(-2);
            $table->integer('inquest_duration')->default(0);
            $table->timestamp('date_mod')->nullable()->index('date_mod');
            $table->timestamp('date_creation')->nullable()->index('date_creation');
            $table->string('autofill_decommission_date', 255)->default('-2');
            $table->integer('suppliers_as_private')->default(-2);
            $table->integer('anonymize_support_agents')->default(-2);
            $table->unsignedInteger('contracts_id_default')->default(0)->index('contracts_id_default');
            $table->integer('display_users_initials')->default(-2);
            $table->integer('enable_custom_css')->default(-2);
            $table->mediumText('custom_css_code')->nullable();
            $table->string('latitude', 255)->nullable();
            $table->string('longitude', 255)->nullable();
            $table->string('altitude', 255)->nullable();
            $table->tinyInteger('calendars_strategy')->default(-2);
            $table->tinyInteger('changetemplates_strategy')->default(-2);
            $table->tinyInteger('contracts_strategy_default')->default(-2);
            $table->tinyInteger('entities_strategy_software')->default(-2);
            $table->tinyInteger('problemtemplates_strategy')->default(-2);
            $table->tinyInteger('tickettemplates_strategy')->default(-2);
            $table->tinyInteger('transfers_strategy')->default(-2);
            $table->string('from_email', 255)->nullable();
            $table->string('from_email_name', 255)->nullable();
            $table->string('noreply_email', 255)->nullable();
            $table->string('noreply_email_name', 255)->nullable();
            $table->unsignedInteger('transfers_id')->default(0)->index('transfers_id');
            $table->string('agent_base_url', 255)->nullable();

            $table->unique(['entities_id', 'name'], 'unicity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glpi_entities');
    }
};
