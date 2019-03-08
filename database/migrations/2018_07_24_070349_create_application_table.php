<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime("start_time")->nullable();
            $table->string("previous_id")->nullable();
            $table->unsignedInteger("loan_amount");
            $table->unsignedInteger("loan_period");
            $table->string('type');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('dob');
            $table->string('mobile');
            $table->string('sex');
            $table->string("phone");
            $table->string('email');
            $table->unsignedInteger('no_of_dependent');
            $table->string("marital_status");
            $table->unsignedInteger('ddl_share_partner')->nullable();
            $table->unsignedInteger("partner_income")->nullable();
            $table->string("em_contact_name");
            $table->string("em_contact_no");
            $table->string("relationship");
            $table->string("id_details");
            $table->string("license_no")->nullable();
            $table->string("license_state")->nullable();
            $table->string("license_expiry")->nullable();
            $table->string("card_no")->nullable();
            $table->string("place_of_issue")->nullable();
            $table->string("passport_no")->nullable();
            $table->string("issue_country")->nullable();
            $table->string("residential_addr");
            $table->string('street_number');
            $table->string('route');
            $table->string('locality');
            $table->string('administrative_area_level_1');
            $table->unsignedInteger('postal_code');
            $table->string("time_at_addr_from");
            $table->string("residential_status");
            $table->string("agent_name")->nullable();
            $table->string("agent_mobile")->nullable();
            $table->unsignedInteger("rent_amt")->nullable();
            $table->string("mortgage_detail")->nullable();
            $table->string("emp_status");
            $table->date("employ_start_date")->nullable();
            $table->string("occupation")->nullable();
            $table->string("company_name")->nullable();
            $table->string("company_addr")->nullable();
            $table->string("company_phone")->nullable();
            $table->date("primary_next_pay_date")->nullable();
            $table->string("primary_income_freq")->nullable();
            $table->date("unemp_next_pay_date")->nullable();
            $table->unsignedInteger("another_job");
            $table->string("second_emp_status")->nullable();
            $table->date("next_pay_date")->nullable();
            $table->string("another_company_name")->nullable();
            $table->string("another_company_addr")->nullable();
            $table->string("another_company_phone")->nullable();
            $table->string("second_occupation")->nullable();
            $table->string("income_freq")->nullable();
            $table->date("length_of_employment")->nullable();
            $table->string("loan_purpose");
            $table->string("explanation");
            $table->string("monthly_after_tax");
            $table->string("mortgage_rent");
            $table->string("travel_expense");
            $table->string("insurance");
            $table->string("credit_limit");
            $table->unsignedInteger("repay_loan");
            $table->unsignedInteger("credit_defaults");
            $table->unsignedInteger("given_info");
            $table->unsignedInteger("credit_guide");
            $table->unsignedInteger("non_essential_spending");
            $table->unsignedInteger("loan_interest");
            $table->string("hear_about_us");
            $table->unsignedInteger("home_utility_exp");
            $table->unsignedInteger("pension");
            $table->unsignedInteger("food_entertainment");
            $table->unsignedInteger("personal_exp");
            $table->unsignedInteger("loan_payment");
            $table->unsignedInteger("undischarged_bankrupt");
            $table->unsignedInteger("total_income")->nullable();
            $table->unsignedInteger("total_expense")->nullable();
            $table->string("communication");
            $table->string("reason")->nullable();
            $table->unsignedInteger("sortterm_loan");
            $table->unsignedInteger("loan_num");
            $table->string("loan_info")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application');
    }
}
