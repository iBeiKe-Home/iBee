<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IbeeUserAttention extends Model
{

    protected $table = 'ibee_user_attention';

    protected $fillable = ['userid', 'attention_userid'];

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