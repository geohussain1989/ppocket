<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['bank_id','tran_date','debit','credit','desctiption'];
}
