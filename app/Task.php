<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['content','date','application_id','attachment_1','attachment_2','attachment_3','type','complete'];

}
