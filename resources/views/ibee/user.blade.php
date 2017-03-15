@extends('common.layouts')

@section('style')
    <style>
        body{
            background: #eee;
        }
        .user-profile{
            /*height: 600px;*/
            background: #fff;

        }
        .user-avatar{
            position: relative;
            top: -40px;
            left: 40px;
            height: 160px;
            width: 160px;
            float: left;
            border: 5px solid white;
        }
        .user-avatar img{
            height: 160px;
            width: 160px;
        }
        .user-profile-header{
            float: none;
            width: 100%;
        }
        .user-profile-header p{
            line-height: 50px;
            text-indent: 60px;
            font-size: 2em;
            font-weight: bold;
            margin-bottom: 0;
        }
        .fans-follow-credit{
            margin-left: 230px;
        }
        .fans-follow-credit span{
            display: inline-block;
            width: 120px;
            font-size: 1.2em;
            color: #999;
            line-height: 40px;
        }
        p.breif-intro{
            font-size: 1.5em;
            font-weight: normal;
            line-height: 30px;
            margin-top: 0;
        }
        .button-right{
            position: relative;
            float: right;
            top: -100px;
            right: 20px;
        }
        .user-profile-bottom{
            margin-top: 30px;
            padding-bottom: 30px;
            padding-left:100px;
            padding-right: 100px; 

        }
        .his-article{
        }
        .his-article h1{
            font-size: 30px;
            line-height: 50px;
            margin-bottom: 0;
        }
        .his-article-img{
            height: 150px;
            overflow: hidden;
        }
        .his-article-img img{
            width: 100%;
        }
        .his-article-title a{
            text-decoration: none;
            text-indent: 25px;
        }
        .his-article-info{
            padding: 0px 25px 15px 25px;
            height: 30px;
        }
        .uk-label{
            padding: 6px 8px;
        }
        .his-article-info span{
            font-size: 16px;
            line-height: 18px;
        }
        .article-likes{
            display: inline-block;
            float: right;
        }
        .article-likes span{
            font-size: 18px !important;
            line-height: 28px !important;
        }
        .article-comments{
            display: inline-block;
            float: right;
            margin-right: 15px;
        }
        .article-comments span{
            font-size: 18px !important;
            line-height: 28px !important;
        }
        .ibee-footer{
            height: 20px;
            background: #333;
            color: #fff;
            padding: 20px;
            font-size: 1.2em;
            line-height: 20px;
        }
        .ibee-footer a{
            color: #fff;
            text-decoration: none;
            margin-right: 10px;
        }
        .pagination li{
            text-decoration: none;
            list-style: none;
            display: inline;
            border: 1px solid #FFFFFF;
            font-size: 20px;
            background: #F7C205;
            padding: 5px 8px;
            border-radius: 2px;
        }
        .pagination a{
            text-decoration: none;
        }
        .pagination a{
            color: black;
        }
        .pagination :hover{
            background-color: rgb(255, 201, 5);
            color: white;
        }

        .pagination .active{
            background-color: #1a1a1a;
            color: white;
        }
        .pagination .active :hover{
            background-color: #1a1a1a;
            color: white;
        }
        @media(max-width:960px){
            .uk-container{
                width: 100%;
                padding-left: 0px;
                padding-right: 0px;
            }
        }@media(max-width:640px){
            .user-avatar,.user-avatar img{
                height: 80px;
                width: 80px;
            }
            .fans-follow-credit span{
                width: auto;
            }
            .button-right{
                float: none;
                top: 10px;
                left: 45px;
            }
            .uk-overlay{
                padding: 10px;
            }
            .fans-follow-credit{
                margin-left: 0px;
                margin-top: 10px;
            }
            .user-profile-bottom{
                padding-left: 0;
                padding-right: 0;
            }
            p.breif-intro{
                margin: 0;
                text-indent: 45px;
            }
        }

    </style>

@stop

@section('content')
    {{--用户信息--}}
    <div class="uk-container ">
    <div style="height: 100px;"></div>
    <div class="uk-container uk-width-5-6@m">
        <div class="user-profile">
            <div class="user-avatar uk-transition-toggle uk-text-center">
                <img src="{{ asset('static/asset/img/gravatar.png') }}">
                <div class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-default">
                <p class="uk-h6 uk-margin-remove"><a href="#" style="text-decoration: none;color: #000;">修改头像</a></p>
            </div>
            </div>
            <div class="user-profile-header">
                <p>{{ $ibee_user_info->nickname }}</p>
                <div class="fans-follow-credit">
                    <span>{{ $ibee_user_info->fan_num }} 粉丝</span>
                    <span>{{ $ibee_user_info->follow_num }} 关注</span>
                    <span>{{ $ibee_user_info->credit }} 积分</span>
                </div>
                <p class="breif-intro">
                    {{ $ibee_user_info->intro ? $ibee_user_info->intro : 'Ta好懒啊'}}
                </p>
            </div>
            <div class="button-right">
                @if(Session::get('modifiable'))
                    <button class="uk-button uk-button-primary"><i class="fa fa-plus" aria-hidden="true"></i> 修改</button>
                @else
                    <button class="uk-button uk-button-primary"><i class="fa fa-plus" aria-hidden="true"></i> 关注</button>
                    <button class="uk-button uk-button-primary"><i class="fa fa-envelope-o" aria-hidden="true"></i> 私信</button>
                @endif
            </div>
            <div class="user-profile-bottom">
                <ul class="uk-tab" data-uk-tab="{connect:'#profile-tab'}">
                    <li class="uk-active"><a href="">Ta的个人资料</a></li>
                    <li><a href="">iBee</a></li>
                    <li><a href="">已发布</a></li>
                    <li><a href="">待审核</a></li>
                    <li><a href="">草稿</a></li>
                </ul>
                <ul id="profile-tab" class="uk-switcher uk-margin">
                    <li>
                        <div>
                            <table class="uk-table uk-table-striped">
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $ibee_user_info->email }}</td>
                                </tr>
                                <tr>
                                    <th>电话</th>
                                    <td>{{ $ibee_user_info->tel }}</td>
                                </tr>
                                <tr>
                                    <th>性别</th>
                                    <td>{{ $ibee_user_info->getSex($ibee_user_info->sex) }}</td>
                                </tr>
                                <tr>
                                    <th>生日</th>
                                    <td>{{ $ibee_user_info->birthday }}</td>
                                </tr>
                                <tr>
                                    <th>地址</th>
                                    <td>{{ $ibee_user_info->address }}</td>
                                </tr>
                            </table>
                        </div>
                    </li>
                    <li>
                        <div>
                            @foreach($ibee_article_info as $article)
                                <div class="his-article">


                                    <div class="his-article-title">
                                        <a href="{{ route('article', ['articleid' => $article->articleid]) }}"><h1>{{ $article->title }}</h1></a>
                                    </div>
                                    <div class="his-article-info">
                                        <div class="uk-label"><span>{{ $article->getTag($article->tag) }}</span></div>
                                        <div class="article-likes">
                                            <i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i><span>{{ $article->like }}</span>
                                        </div>
                                        <div class="article-comments">
                                            <i class="fa fa-comments fa-2x" aria-hidden="true"></i><span>{{ $article->comment }}</span>
                                        </div>
                                    </div>

                                </div>
                                </br>
                            @endforeach

                            <div style="height: 60px;padding: 40px;">
                                <div class="uk-container ">
                                    <ul class="uk-pagination uk-flex-center">
                                        {!! $ibee_article_info->render() !!}
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </li>
                    <li>这里是已发布</li>
                    <li>这里是待审核</li>
                    <li>这里是草稿</li>
                </ul>
            </div>
        </div>
    </div>
    <div style="height: 200px;"></div>
    </div>

    {{--<script>
        $('.pagination li a').click(function () {
            $.ajax({
                url: '?page=' + this.innerHTML,
                type: 'get',
                success: function () {
                    alert("提交成功");
                },
                error: function () {
                    alert("提交失败");
                }
            });
        });

    </script>--}}
@stop

@section('back_to_top')
@stop