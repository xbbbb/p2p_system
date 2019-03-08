<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'mobile',
        'sex',
        "phone",
        'no_of_dependent',
        'ddl_share_partner',
        "partner_income",
        "em_contact_name",
        "em_contact_no",
        "relationship",
        "id_details",
        "license_no",
        "license_state",
        "license_expiry",
        "card_no",
        "place_of_issue",
        "passport_no",
        "issue_country",
        "residential_addr",
        "time_at_addr_from",
        "residential_status",
        "residential_status_details",
        "mortgage_detail",
        "agent_name",
        "agent_mobile",
        "emp_status",
        "employ_start_date",
        "occupation",
        "company_name",
        "company_addr",
        "company_phone",
        "primary_next_pay_date",
        "primary_income_freq",
        "unemp_next_pay_date",
        "another_job",
        "second_emp_status",
        "next_pay_date",
        "another_company_name",
        "another_company_addr",
        "another_company_phone",
        "second_occupation",
        "income_freq",
        "length_of_employment",
        'street_number',
        'route',
        'locality',
        'administrative_area_level_1',
        'postal_code',
        'marital_status',
        'id_img',
        'car_photo',
        'certification',
        'doc_with_address',
        'plate',
        'engine',
        'payslip',
        'insurance',
        'status',
        'undesirable'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
