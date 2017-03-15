<?php

namespace App\Http\Controllers;

use App\IbeeArticleInfo;
use App\IbeeUserInfo;
use App\IbeeUserLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function show_index(){
        $ibee_article_info = IbeeArticleInfo::where('status', 10)
            ->orderBy('created_at', 'decs')
            ->paginate(4);


        return view('ibee.index', [
            'ibee_article_info' => $ibee_article_info
        ]);
    }

    public function show_article(Request $request, $articleid){
        if($request->ajax()){
            $ibee_article_content = IbeeArticleInfo::where('articleid', $articleid)->first();
            return Storage::disk('article')->get($ibee_article_content->content);
        } else {
            $ibee_article_content = IbeeArticleInfo::where('articleid', $articleid)->first();
            $ibee_author_info = IbeeUserInfo::where('userid', $ibee_article_content->userid)->first();

            if (Session::has('user_info')){
                $ibee_like = IbeeUserLike::where([
                    'userid' => Session::get('user_info')[0],
                    'articleid' => $articleid
                ])->first();
                if ($ibee_like){
                    $ibee_like = true;
                }else{
                    $ibee_like = false;
                }
            } else {
                $ibee_like = false;
            }
            return view('ibee.article', [
                'ibee_article_content' => $ibee_article_content,
                'ibee_author_info' => $ibee_author_info,
                'ibee_like' => $ibee_like
            ]);
        }

    }

    public function show_tag_content($tag_class){
        $ibee_article_info = IbeeArticleInfo::where([
            'status' => 10,
            'tag' => $tag_class
        ])->paginate(2);

        return view('ibee.index', [
            'ibee_article_info' => $ibee_article_info
        ]);
    }

    public function article_like($articleid){

        if(Session::has('user_info')){
            $like_before = IbeeUserLike::where([
                'userid' => Session::get('user_info')[0],
                'articleid' => $articleid
            ])->first();
            if ($like_before){
                return 1;//已点过赞
            }else{
                IbeeArticleInfo::where('articleid', $articleid)->increment('like');
                IbeeUserLike::create([
                    'userid' => Session::get('user_info')[0],
                    'articleid' => $articleid
                ]);
                return 0;//点赞成功
            }

        }else{
            return -1;//未登录
        }
    }


}