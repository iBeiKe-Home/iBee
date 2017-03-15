<?php

namespace App\Http\Controllers;

use App\IbeeArticleInfo;
use App\IbeeUserInfo;
use App\IbeeUserLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class EditController extends Controller
{

    public function show_edit(){
        if (Session::has('user_info')){
            return view('ibee.edit');
        } else {
            return "请登录！";
        }
    }

    public function save_as_draft(Request $request){
        if($request->ajax()){
            $prefix = Session::get('user_info')[0].time();
            Storage::disk('article')->put($prefix.'draft.json', $request->input());
            IbeeArticleInfo::create([
                'userid' => Session::get('user_info')[0],
                'nickname' => Session::get('user_info')[1],
                'content' => $prefix.'draft.json',
                'view_num' => 0,
                'collection_num' => 0,
                'title' => 'just three tests',
                'bg_picture' => 'just a test12',
                'like' => 0,
                'comment' => 0,
                'tag' => 10,
                'status' => 30
            ]);
//            IbeeUserInfo::where('userid', zaession::get('user_info')[0])->increment('post_num');
            return $request->input('content');
        }else{
            return '提交失败';
        }
    }
 
    public function article_submit(Request $request){
        if($request->ajax()){
            $prefix = Session::get('user_info')[0].time();
            Storage::disk('article')->put($prefix.'article.json', $request->input());
            IbeeArticleInfo::create([
                'userid' => Session::get('user_info')[0],
                'nickname' => Session::get('user_info')[1],
                'content' => $prefix.'article.json',
                'view_num' => 0,
                'collection_num' => 0,
                'title' => 'just three tests',
                'bg_picture' => 'just a test12',
                'like' => 0,
                'comment' => 0,
                'tag' => 10,
                'status' => 10
            ]);
            IbeeUserInfo::where('userid', Session::get('user_info')[0])->increment('post_num');
            return $request->input('content');
        }else{
            return '提交失败';
        }
    }

}