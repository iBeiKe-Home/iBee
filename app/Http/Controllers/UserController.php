<?php

namespace App\Http\Controllers;

use App\IbeeArticleInfo;
use App\IbeeUserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function show_user($user_id){

        if(Session::has('user_info') && Session::get('user_info')[0] == $user_id ){
            Session::put('modifiable', true);

            return view("ibee.user", [
                'ibee_user_info' => IbeeUserInfo::where('userid', $user_id)->first(),
                'ibee_article_info' => IbeeArticleInfo::where('userid', $user_id)
                    ->orderBy('created_at', 'decs')
                    ->paginate(4)
            ]);
        }else{
            Session::put('modifiable', false);

            return view("ibee.user", [
                'ibee_user_info' => IbeeUserInfo::where('userid', $user_id)->first(),
                'ibee_article_info' => IbeeArticleInfo::where([
                    'userid' => $user_id,
                    'status' => 10
                ])->orderBy('created_at', 'decs')->paginate(4)
            ]);
        }
    }

    //用户登录
    public function user_sign_in(Request $request){
        //获得输入
        $sign_in_info = $request->input('IbeeUserInfo');

        //验证输入
        $validate_result = IbeeUserInfo::where([
            'email' => $sign_in_info['email'],
            'password' => sha1($sign_in_info['password'])
        ])->first();

        //若输入一致，生成session，并重定向到首页
        if ($validate_result){
            Session::push('user_info', $validate_result['userid']);
            Session::push('user_info', $validate_result['nickname']);

            return redirect()->back()->with('success', '登录成功');
        }else{
            return redirect()->back()->with('error');
        }
    }

    //用户注册
    public function user_sign_up(Request $request){

        //验证表单
        $validator = \Validator::make($request->input('IbeeUserInfo'), [
            //TODO: unique回头再加
            'nickname' => 'required|unique:ibee_user_info|min:2|max:20',
            'email' => 'required|unique:ibee_user_info|email',
            'password' => 'required|confirmed'
        ], [
            'unique' => ':attribute已经有人注册过了',
            'required' => ':attribute为必填项',
            'min' => ':attribute长度不符合要求',
            'max' => ':attribute长度不符合要求',
            'email' => ':attribute必须为邮箱地址形式',
            'confirmed' => ':attribute的两次输入不一致'
        ], [
            'nickname' => '昵称',
            'email' => 'Email',
            'password' => '密码'
        ]);


        if($validator->fails()){
            //将错误信息发给首页
            return redirect('index')->withErrors($validator)->withInput();
        }else{

            //将注册信息放入ibee_user_info表中
            $sign_up_info = $request->input('IbeeUserInfo');
            $create_result = IbeeUserInfo::create([
                'nickname' => $sign_up_info['nickname'],
                'password' => sha1($sign_up_info['password']),
                'photo' => 'default',
                'email' => $sign_up_info['email'],
                'tel' => 0,
                'sex' => 10,
                'birthday' => 0,
                'credit' => 0,
                'fan_num' => 0,
                'follow_num' => 0,
                'post_num' => 0
            ]);

            //得到session
            if ($create_result){
                $session_to_put = IbeeUserInfo::where('nickname', $sign_up_info['nickname'])->first();

                Session::push('user_info', $session_to_put['userid']);
                Session::push('user_info', $session_to_put['nickname']);

                return redirect('index')->with('success', '注册成功');
            }else{
                return redirect()->back()->with('error');
            }
        }
    }

    //退出iBee，清除session并返回首页
    public function exit_ibee(){
        Session::flush();
        return redirect('index');
    }
}