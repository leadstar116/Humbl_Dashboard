<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invites extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invites';

    public function user()
    {
        return $this->belongsTo('App\BusinessUser');
    }

}