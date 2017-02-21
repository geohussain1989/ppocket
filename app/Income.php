<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    /**
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'title',
        'type',
        'date',
        'amount',
        'description'
    ];


    public function IncomeTypes()
    {
        return $this->hasOne('App\IncomeTypes','type');
    }
}
