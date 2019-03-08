<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifiedLoan extends Model
{
    protected $fillable = ["verification_id","lender","monthly_amount","type"];
}
