<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $fillable = [
        'application_id','salary','benefits','ID_one','ID_two','address_one','address_two','DOB_one','DOB_two','payslip','landlord','employ_note','employ_google','employ_name','employ_address',
        'employ_phone','income','expense','dishonor','high_risk','large_debit','equifax'
    ];
}
