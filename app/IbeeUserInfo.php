<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IbeeUserInfo extends Model
{

    //定义性别常量
    const SEX_UN = 10;
    const SEX_MALE = 20;
    const SEX_FEMALE = 30;

    protected $table = 'ibee_user_info';

    protected $fillable = [
        'password',
        'email',
        'tel',
        'sex',
        'birthday',
        'address',
        'credit',
        'fan_num',
        'follow_num',
        'intro',
        'nickname',
        'photo',
        'post_num'
    ];

    public $timestamps = true;


    protected function getDateFormat()
    {
        return time();
    }

    protected function asDateTime($value)
    {
        return $value;
    }

    //得到性别
    public function getSex($sex_user = null){
        $sex_array = [
            self::SEX_UN => '未公开',
            self::SEX_MALE => '男',
            self::SEX_FEMALE => '女'
        ];

        if($sex_user !== null){
            return array_key_exists($sex_user, $sex_array) ? $sex_array[$sex_user] : $sex_array[self::SEX_UN];
        }

        return $sex_array;
    }


    protected $hidden = [
        'password'
    ];

}