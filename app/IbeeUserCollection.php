<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IbeeUserCollection extends Model
{

    protected $table = 'ibee_user_collection';

    protected $fillable = ['userid', 'articleid'];

    public $timestamps = true;

    protected function getDateFormat()
    {
        return time();
    }

    protected function asDateTime($value)
    {
        return $value;
    }

}