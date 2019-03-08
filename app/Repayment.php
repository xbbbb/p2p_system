<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repayment extends Model
{
    protected $fillable = ['index','application_id','amount','paid_amount','due','note'];

}
