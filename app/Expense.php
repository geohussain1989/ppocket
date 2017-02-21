<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
      /**
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'title',
        'expense_type',
        'date',
        'amount',
        'comments'
    ];

}
