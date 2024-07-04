<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('society_registrations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->string('applicant_name');
            $table->string('mobile_no');
            $table->string('email');
            $table->string('gender');
            $table->date('dob');
            $table->string('name_of_society');
            $table->date('date');
            $table->string('applicant_address');
            $table->string('office_address');
            $table->string('district');
            $table->string('memorandum');
            $table->binary('memorandum_doc');
            $table->string('rules_and_regulation');
            $table->binary('rules_and_regulation_doc');
            $table->string('notarized_affidavit');
            $table->binary('notarized_affidavit_doc');
            $table->string('no_objection_certificate');
            $table->binary('no_objection_certificate_doc');
            $table->string('proof_of_ownership');
            $table->binary('proof_of_ownership_doc');
            $table->string('residential_proof');
            $table->binary('residential_proof_doc');
            $table->string('sdpo_silvassa_report')->nullable();
            $table->binary('sdpo_silvassa_report_doc')->nullable();
            $table->string('sdpo_khanvel_report')->nullable();
            $table->binary('sdpo_khanvel_report_doc')->nullable();
            $table->string('sdpo_other_report')->nullable();
            $table->binary('sdpo_other_report_doc')->nullable();
            $table->string('mamlatdar_silvassa_report')->nullable();
            $table->binary('mamlatdar_silvassa_report_doc')->nullable();
            $table->string('mamlatdar_khanvel_report')->nullable();
            $table->binary('mamlatdar_khanvel_report_doc')->nullable();
            $table->string('mamlatdar_other_report')->nullable();
            $table->binary('mamlatdar_other_report_doc')->nullable();
            $table->string('sdpo_name')->nullable();
            $table->string('sdpo_address')->nullable();
            $table->string('mamlatdar_name')->nullable();
            $table->string('mamlatdar_address')->nullable();
            $table->string('challan_receipt')->nullable();
            $table->binary('challan_receipt_doc')->nullable();
            $table->string('status')->nullable();
            $table->integer('registration_no')->nullable();
            $table->integer('registration_year')->nullable();
            $table->date('hearing_date')->nullable();
            $table->string('hearing_time')->nullable();
            $table->string('hearing_notice_to_applicant')->nullable();
            $table->string('payment_received')->nullable();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE society_registrations MODIFY memorandum_doc MEDIUMBLOB");
        DB::statement("ALTER TABLE society_registrations MODIFY rules_and_regulation_doc MEDIUMBLOB");
        DB::statement("ALTER TABLE society_registrations MODIFY notarized_affidavit_doc MEDIUMBLOB");
        DB::statement("ALTER TABLE society_registrations MODIFY no_objection_certificate_doc MEDIUMBLOB");
        DB::statement("ALTER TABLE society_registrations MODIFY proof_of_ownership_doc MEDIUMBLOB");
        DB::statement("ALTER TABLE society_registrations MODIFY residential_proof_doc MEDIUMBLOB");
        DB::statement("ALTER TABLE society_registrations MODIFY sdpo_silvassa_report_doc MEDIUMBLOB NULL");
        DB::statement("ALTER TABLE society_registrations MODIFY sdpo_khanvel_report_doc MEDIUMBLOB NULL");
        DB::statement("ALTER TABLE society_registrations MODIFY sdpo_other_report_doc MEDIUMBLOB NULL");
        DB::statement("ALTER TABLE society_registrations MODIFY mamlatdar_silvassa_report_doc MEDIUMBLOB NULL");
        DB::statement("ALTER TABLE society_registrations MODIFY mamlatdar_khanvel_report_doc MEDIUMBLOB NULL");
        DB::statement("ALTER TABLE society_registrations MODIFY mamlatdar_other_report_doc MEDIUMBLOB NULL");
        DB::statement("ALTER TABLE society_registrations MODIFY challan_receipt_doc MEDIUMBLOB NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('society_registrations');
    }
};
