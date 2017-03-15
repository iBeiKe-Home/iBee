<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IbeeComment extends Model
{

    protected $table = 'ibee_comment';

    protected $fillable = ['userid', 'content'];

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