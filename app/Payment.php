<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'business_payment';

    public function user()
    {
        return $this->belongsTo('App\BusinessUser');
    }
}