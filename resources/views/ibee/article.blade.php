@extends('common.layouts')

@section('style')
    <!-- about the text editor -->
    <link href="https://cdn.quilljs.com/1.1.5/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.1.5/quill.js"></script>
    <!-- end -->
    <style>
        html{
            background: #F2F2F2;
        }
        .article-header{
            background: #fff;
            height: 410px;
        }
        .article-img{
            height: 350px;
            overflow: hidden;
        }
        .article-img img{
            width: 100%;
        }
        .article-info{
            padding: 15px 25px 15px 25px;
            height: 30px;
        }
        .article-info time em{
            color: black;
            margin-right: 20px;
            font-size: 1.2em;
            line-height: 30px;
        }
        .uk-label{
            padding: 6px 8px;
        }
        .article-info span{
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
        .article-content{
            background: #fff;
            padding: 25px;
        }
        .article-title{
            text-align: center;
        }
        .article-title h1{
            font-weight: bold;
        }
        .article-side{
            background: #fff;
        }
        .side-author-info{
            height: 185px;
        }
        .side-author-img{
            height: 100px;
            width: 100px;
            margin:15px;
            display: inline-block;
        }
        .side-author-img img{
            vertical-align: baseline;
        }
        .side-author-id-posts{
            margin: 15px 15px 15px 0;
            display: inline-block;
            vertical-align: top;
        }
        p#author-id{
            font-size: 1.5em;
            font-weight: bold;
        }
        p#author-posts{
            font-size: 1.1em;
        }
        .side-author-buttons{
            margin: 0 15px;
        }
        .side-author-buttons button{
            width: 110px;
        }
        .side-other-article{
            height: 600px;
        }

        #modal-logo{
            display: block;
            margin: 0 auto;
        }
        #signin p{
            text-align: center;
            font-size: 1.2em;
            margin-top: 5px;
        }
        #modal-submit{
            margin-top: 20px;
            width: 280px;
        }
        #modal-submit label{
            float: left;
            font-size: 14px;
            line-height: 30px;
        }
        #modal-submit label input{
            width: 18px;
            height: 18px;
            vertical-align: middle;
            margin-right: 4px;
        }
        #modal-submit button{
            float: right;
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
        #ibee-back-to-top{
            position: fixed;;
            bottom: 100px;
            right: 100px;
        }
        #ibee-back-to-top a i {
            opacity: 0.6;
            color: #F7C205;
        }
        .article-title h1{
            font-size: 3em;
        }
        #ibee-article-container{
            font-size: 1.3em;
        }
        @media(max-width:640px){
            .article-header{
                height: auto;
            }
            .article-img{
                height: 200px;
            }
            .article-info time em{
                font-size: 1em;
            }
            .article-info{
                padding: 10px 15px 10px 15px;
            }
            .article-info i{
                font-size: 20px;
            }
            .uk-label{
                padding: 4px 6px;
                vertical-align: baseline;
            }
        }
    </style>
@stop

@section('content')

    {{--改成了50px_by_Victor--}}
    <div style="height: 50px"></div>
    <div class="uk-container ">
        <div class=" article-header">
            <div class="article-img">
                <img src="{{ asset('static/asset/img/article_img.jpg') }}">
            </div>
            <div class="article-info">
                <time><em>{{ date('Y年m月d日 H:i', $ibee_article_content->created_at) }}</em></time>
                <div class="uk-label"><span>
                        <a href="{{ route('tag', ['tag_class' => $ibee_article_content->tag]) }}" style="text-decoration: none; color: inherit;">
                            {{ $ibee_article_content->getTag($ibee_article_content->tag) }}
                        </a>
                    </span>
                </div>
                <div class="article-likes">
                    @if($ibee_like)
                        <a id="evaluate-good" style="text-decoration: none; color: inherit;"><i id="evaluate-good-icon" style="color: deepskyblue" class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i></a><span id="evaluate-good-num" style="color: deepskyblue">{{ $ibee_article_content->like }}</span>
                    @else
                        <a id="evaluate-good" style="text-decoration: none; color: inherit;"><i id="evaluate-good-icon" class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i></a><span id="evaluate-good-num">{{ $ibee_article_content->like }}</span>
                    @endif

                </div>
                <div class="article-comments">
                    <i class="fa fa-comments fa-2x" aria-hidden="true"></i><span>{{ $ibee_article_content->comment }}</span>
                </div>
            </div>
        </div>
        <div style="height: 35px;"></div>
        <div class="uk-grid">
            <div class="uk-width-expand">
                <div class="article-content">
                    <div class="article-title">
                        <h1>{{ $ibee_article_content->title }}</h1><br/><hr/>
                    </div>
                    <div class="article-body">
                        {{--文章显示的位置--}}
                        <div id="ibee-article-container"></div>
                        {{--<p>{{ $ibee_article_content->content }}</p>--}}
                    </div>
                </div>
            </div>
            <div class="uk-width-medium uk-visible@s">
                <div class="article-side">
                    <div class="side-author-info">
                        <div class="side-author-img">
                            <a href="{{ route('user', ['id' => $ibee_article_content->userid]) }}">
                                <img src="{{ asset('static/asset/img/gravatar.png') }}">
                            </a>
                        </div>
                        <div class="side-author-id-posts">
                            <p id="author-id">
                                <a href="{{ route('user', ['id' => $ibee_article_content->userid]) }}" style="text-decoration: none; color: inherit;">
                                    {{ $ibee_article_content->nickname }}
                                </a>
                            </p>

                            <p id="author-posts">{{ $ibee_author_info->post_num }} 篇文章</p>
                        </div>
                        @if($ibee_article_content->userid == Session::get('user_info')[0])
                            <div class="side-author-buttons">
                                <button class="uk-button uk-button-primary uk-button-large">个人主页</button>
                            </div>
                        @else
                            <div class="side-author-buttons">
                                <button class="uk-button uk-button-primary ">关注</button>
                                <button class="uk-button uk-button-primary " style="float: right;">私信</button>
                            </div>
                        @endif
                    </div>
                    <div style="height: 35px;background: #eee;"></div>
                    <div class="side-other-article">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 50px;"></div>

    <script>
        window.onload = function(){

            var quill = new Quill('#ibee-article-container', {
                modules: {
                    toolbar: []
                },
                readOnly: true
            });

            $.ajax({
                type: 'get',
                success: function (data) {
                    quill.setContents(JSON.parse(data));
                },
                error: function () {
                    quill.setContents("页面加载失败，请稍后再试");
                }
            });
        };

        $("#evaluate-good").click(function () {
            var i, article_id;
            var ajax_url = location.href;

            for (i = -1; i > -1 * ajax_url.length; i--){
                if (ajax_url.slice(i - 1, i) == '/'){
                    article_id = ajax_url.slice(i);
                    break;
                }
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'like/'+article_id,
                type: 'get',
                success: function (data) {
                    if (data == 1){
                        // alert('已点过赞
                        UIkit.notification("已点过赞");
                    } else if (data == 0){
                        document.getElementById('evaluate-good-num').style.color = 'deepskyblue';
                        document.getElementById('evaluate-good-icon').style.color = 'deepskyblue';
                        document.getElementById('evaluate-good-num').innerText = document.getElementById('evaluate-good-num').innerText * 1 + 1;
                    } else {
                        //alert('请登录');
                        UIkit.notification("请登录");
                    }

                },
                error: function () {
                    //alert("点赞失败");
                    UIkit.notification("点赞失败", {status:'danger'});
                }

            });

        });

        $('#ibee-follow-button').click(function () {
            var i, article_id;
            var ajax_url = location.href;

            for (i = -1; i > -1 * ajax_url.length; i--){
                if (ajax_url.slice(i - 1, i) == '/'){
                    article_id = ajax_url.slice(i);
                    break;
                }
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if (document.getElementById('ibee-follow').title == 'follow') {
                $.ajax({
                    url: 'follow/' + article_id,
                    type: 'get',
                    success: function (data) {
                        console.log(data);
                        alert(data);
                        document.getElementById('ibee-follow').innerText = '取消关注';
                        document.getElementById('ibee-follow').title = 'unfollow';
                    },
                    error: function (data) {
                        console.log(data);
                        alert("关注失败");
                    }
                });
            } else {
                $.ajax({
                    url: 'unfollow/' + article_id,
                    type: 'get',
                    success: function (data) {
                        console.log(data);
                        alert(data);
                        document.getElementById('ibee-follow').innerText = '关注';
                        document.getElementById('ibee-follow').title = 'follow';
                    },
                    error: function (data) {
                        alert("取消关注失败");
                    }
                });
            }

        });

    </script>
@stop
@include('common.sign')



