<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IbeeArticleInfo extends Model
{

    const TECH = 10;
    const GAME = 15;
    const LIFE = 20;
    const PHOTO = 25;
    const TRIP = 30;
    const FIT = 35;
    const FASHION = 40;
    const VIDEO = 45;
    const SOURCE = 50;
    const OTHER = 55;

    protected $table = 'ibee_article_info';

    protected $fillable = [
        'content',
        'view_num',
        'collection_num',
        'userid',
        'nickname',
        'title',
        'bg_picture',
        'like',
        'comment',
        'tag',
        'status'
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
    public function getTag($tag_article = null){
        $tag_array = [
            self::TECH => '科技',
            self::GAME => '游戏',
            self::LIFE => '生活',
            self::PHOTO => '摄影',
            self::TRIP => '旅行',
            self::FIT => '健身',
            self::FASHION => '时尚',
            self::VIDEO => '影视',
            self::SOURCE => '资源',
            self::OTHER => '其他'
        ];

        if($tag_article !== null){
            return array_key_exists($tag_article, $tag_array) ? $tag_array[$tag_article] : $tag_array[self::OTHER];
        }

        return $tag_array;
    }

}