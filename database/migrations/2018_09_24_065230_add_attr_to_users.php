<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttrToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger("loan_amount")->nullable();
            $table->unsignedInteger("loan_period")->nullable();
            $table->string('type')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('mobile')->nullable();
            $table->string('sex')->nullable();
            $table->string("phone")->nullable();
            $table->unsignedInteger('no_of_dependent')->nullable();
            $table->string("marital_status")->nullable();
            $table->unsignedInteger('ddl_share_partner')->nullable();
            $table->unsignedInteger("partner_income")->nullable();
            $table->string("em_contact_name")->nullable();
            $table->string("em_contact_no")->nullable();
            $table->string("relationship")->nullable();
            $table->string("id_details")->nullable();
            $table->string("license_no")->nullable();
            $table->string("license_state")->nullable();
            $table->string("license_expiry")->nullable();
            $table->string("card_no")->nullable();
            $table->string("place_of_issue")->nullable();
            $table->string("passport_no")->nullable();
            $table->string("issue_country")->nullable();
            $table->string("residential_addr")->nullable();
            $table->string('street_number')->nullable();
            $table->string('route')->nullable();
            $table->string('locality')->nullable();
            $table->string('administrative_area_level_1')->nullable();
            $table->unsignedInteger('postal_code')->nullable();
            $table->string("time_at_addr_from")->nullable();
            $table->string("residential_status")->nullable();
            $table->string("agent_name")->nullable();
            $table->string("agent_mobile")->nullable();
            $table->unsignedInteger("rent_amt")->nullable();
            $table->string("mortgage_detail")->nullable();
            $table->string("emp_status")->nullable();
            $table->date("employ_start_date")->nullable();
            $table->string("occupation")->nullable();
            $table->string("company_name")->nullable();
            $table->string("company_addr")->nullable();
            $table->string("company_phone")->nullable();
            $table->date("primary_next_pay_date")->nullable();
            $table->string("primary_income_freq")->nullable();
            $table->date("unemp_next_pay_date")->nullable();
            $table->unsignedInteger("another_job")->nullable();
            $table->string("second_emp_status")->nullable();
            $table->date("next_pay_date")->nullable();
            $table->string("another_company_name")->nullable();
            $table->string("another_company_addr")->nullable();
            $table->string("another_company_phone")->nullable();
            $table->string("second_occupation")->nullable();
            $table->string("income_freq")->nullable();
            $table->date("length_of_employment")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('=users', function (Blueprint $table) {
            //
        });
    }
}
