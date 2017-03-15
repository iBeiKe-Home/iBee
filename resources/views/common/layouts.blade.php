<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>iBee @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    @section('reference')
        <link rel="stylesheet" href="{{ asset('static/css/uikit3.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('static/css/ibee-index-main.css') }}">
        <link rel="stylesheet" href="{{ asset('static/asset/font-awesome-4.7.0/css/font-awesome.min.css') }}">
        <script src="{{ asset('static/js/jquery.min.js') }}"></script>
        <script src="{{ asset('static/js/uikit3.min.js') }}"></script>
        <script src="{{ asset('static/js/script.js') }}"></script>
    @show

    @section('style')
        <style>
            .ibee-horizon-menu{
                height: 80px;
                background: #fff;
                padding: 10px 20px;
            }
            .ibee-horizon-menu span{
                font-size: 2em;
                line-height: 60px;
            }
            .ibee-horizon-menu-detail li{
                font-size: 1.4em;
                list-style: none;
                display: inline;
                line-height: 60px;
                /*margin-left: 20px;*/
                margin-left: 1em;
            }
            .ibee-horizon-menu a{
                text-decoration: none;
                color: #555;
            }
            .ibee-article{
                background: #fff;
                height: 365px;
                margin-top: 30px;
                margin-bottom: 10px;
                z-index: 100;
            }
            .ibee-article-author-date{
                padding: 10px 25px;
                height: 50px;
            }
            .ibee-article-author-date img{
                width: 50px;
                height: 50px;
                border-radius: 50%;
                border: 1px solid #aaa;
                margin-right: 10px;
            }
            .ibee-article-author-date span{
                font-size: 1.4em;
                line-height: 50px;
            }
            .ibee-article-author-date time{
                float: right;
                line-height: 50px;
                font-size: 1.2em;
            }
            .ibee-article-img{
                height: 200px;
                overflow: hidden;
            }
            .ibee-article-img img{
                width: 100%;
            }
            .ibee-article-title{
                height: 50px;
                padding: 0 25px;
            }
            .ibee-article-title h1{
                font-size: 30px;
                line-height: 50px;
            }
            .ibee-article-title a{
                text-decoration: none;
            }
            .ibee-article-info{
                padding: 0px 25px 15px 25px;
                height: 30px;
            }
            .uk-label{
                padding: 4px 6px;
            }
            .ibee-article-info span{
                font-size: 16px;
                line-height: 18px;
            }
            .article-likes{
                display: inline-block;
                float: right;
            }
            .article-likes span{
                font-size: 20px ;
                line-height: 28px !important;
            }
            .article-comments{
                display: inline-block;
                float: right;
                margin-right: 15px;
            }
            .article-comments span{
                font-size: 20px ;
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
            #ibee-back-to-top{
                position: fixed;;
                bottom: 100px;
                right: 100px;
            }
            #ibee-back-to-top a i{
                opacity: 0.6;
                color: #F7C205;
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
            .pagination .disabled span{
                 color: black;
             }

            .pagination .active :hover{
                background-color: #1a1a1a;
                color: white;
            }          
        </style>
    @show
</head>
<body>
@section('header_nav_site')
    {{--导航栏--}}
    <style>
        /*style of navbar*/
            .uk-navbar{
                height: 65px;
                background: #231F20 !important;
            }
            .uk-navbar-item{
                height: 65px;
            }
            .uk-navbar .uk-logo{
                height: 65px;
            }
            #logo{
                height: 65px;
            }
            .uk-navbar-nav>li>a{
                height: 61px;
                line-height: 61px;
                font-size: 20px;
                color: #fff !important;
                text-transform: none;
                margin-top: 0;
            }
            .uk-navbar-nav > li {
                border-bottom: 4px solid transparent;
            }
            .uk-navbar-nav > li:hover{
                border-bottom: 4px solid #F7C205;
            }
            .uk-navbar-nav > li:hover > a, .uk-navbar-nav > li > a:focus, .uk-navbar-nav > li.uk-open > a{
                background-color: #231F20;
                color: #fff;
            }
            .uk-nav-dropdown > li {
                background-color: #231F20;
                /*color: */
            }
            .uk-nav-dropdown > li > a:hover,
            .uk-nav-dropdown > li > a:focus {
                background: #333;
            }
            .uk-nav-dropdown > li > a{
                color: #fff;
            }
            .uk-navbar-dropdown{
                background: #231F20;
                padding: 0;
            }
            .uk-nav-dropdown-nav>li>a{
                height: 40px;
                font-size: 20px;
                line-height: 40px;
                text-indent: 1em;
                
            }
            .uk-nav-dropdown-nav>li>a:hover{
                background-color: #444;
            }
            .uk-nav>li>a{
                color: #fff;
            }

            .uk-navbar-content{
                height: 65px;
            }
            .uk-navbar-content form button{
                background-color: #F7C205;
                color: #231F20;
            }
            .uk-button-primary{
                    background:#F7C205;
                    color: #000;
                    border-radius: 2px;
            }
            .uk-button-primary:hover, .uk-button-primary:focus{
                background-color: #F5C934 !important;
                color: #231F20;
            }
            .uk-navbar-item form{
                margin-bottom: 0px;
                margin-top: 0px;
            }
            .uk-navbar-item .uk-input:focus{
                border-color:#F7C205;
            }
            .uk-navbar-toggle{
                display: none;
            }
            .ibee-content{
                background-color: #F2F2F2;
            }
            .uk-offcanvas-bar form{
                position: fixed;
                bottom: 20px;
            }

            @media(max-width:960px){
                .uk-navbar-toggle{
                    display: flex;
                }                
                .uk-navbar ul.uk-navbar-nav{
                    display: none;
                }
                .uk-navbar .uk-navbar-right .uk-navbar-item{
                    display: none;
                }
                .ibee-horizon-menu-detail{
                    display: none;
                }
            }

            @media(max-width:640px) {
                .ibee-article{
                    width: 100%;
                    border-radius: 0;
                    height: 330px;
                }
                .uk-container{
                    padding-left: 0;
                    padding-right: 0;
                }
                .ibee-article-author-date time{
                    font-size: 0.8em;
                    color: #666;
                }
                .ibee-article-title h1{
                    font-size: 25px;
                    line-height: 35px;
                }
                .ibee-article-title{
                    height: 35px;
                }
                .ibee-article-info i{
                    font-size: 20px;
                }
                .ibee-article-info span{
                    font-size: 16px !important;
                }
                .ibee-article-author-date img
                {
                    width: 35px;
                    height: 35px;

                }
                .ibee-article-author-date span{
                    font-size: 1.2em;
                }
                .ibee-article-author-date{
                    padding: 0px 15px;
                }
                
                #ibee-back-to-top{
                    bottom: 30px;
                    right: 30px;
                }
                #ibee-back-to-top a i{
                    opacity: 0.8;
                    text-shadow: 2px 2px 12px #444;
                }
            }
    </style>
    <nav class="uk-navbar-container" uk-navbar>
        <div class="uk-navbar-left">

        <a href="{{ route('index') }}" class="uk-navbar-item uk-logo" ><img src="{{ asset('static/asset/img/logo2.png') }}" id="logo"></a>

            <ul class="uk-navbar-nav">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('edit') }}">发表</a></li>

                <li>
                <a>更多 <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-nav-dropdown-nav">
                            <li><a href="#">网站一</a></li>
                            <li><a href="#">网站二</a></li>
                        </ul>
                    </div>
                </li>

            </ul>
            

        </div>


        <div class="uk-navbar-right">
            
            <div class="uk-navbar-item">
                <form action="">
                        <input type="text" placeholder="Search..."  class="uk-input uk-form-width-small">
                        <button class="uk-button uk-button-primary">搜索</button>
                </form>
            </div>
            <ul class="uk-navbar-nav">
                @if(Session::has('user_info'))
                    <li><a href="{{ route('user', ['id' => Session::get('user_info')[0]]) }}">
                            {{ Session::get('user_info')[1] }}
                        </a>
                    </li>
                    <li><a href="{{ route('exit') }}">退出 iBee</a></li>
                @else
                    <li><a href="#signin" uk-toggle>登录 iBee</a></li>
                    <li><a href="#signup" uk-toggle>注册 iBee</a></li>
                @endif
            </ul>
            
        </div>
        <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#" uk-toggle="target: #offcanvas-push" style="height: 65px;"></a>
    </nav>


    <!-- 下面是移动端的菜单 -->
    <div id="offcanvas-push" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">
    <ul class="uk-nav-primary uk-nav-parent-icon uk-nav-center" uk-nav>
        <li class="uk-active"><a href="#">IBEE</a></li>
        <li class="uk-parent">
            <a href="#">分类</a>
            <ul class="uk-nav-sub">
                <li><a href="#">科技</a></li>
                <li><a href="#">游戏</a></li>
                <li><a href="#">生活</a></li>
                <li><a href="#">摄影</a></li>
                <li><a href="#">旅行</a></li>
                <li><a href="#">健身</a></li>
                <li><a href="#">时尚</a></li>
                <li><a href="#">影视</a></li>
                <li><a href="#">资源</a></li>
                <li><a href="#">其他</a></li>
            </ul>
        </li>
        <li class="uk-parent">
            <a href="#">更多</a>
            <ul class="uk-nav-sub">
                <li><a href="#">网站一</a></li>
                <li><a href="#">网站二</a></li>
            </ul>
        </li>
        
        <li class="uk-nav-divider"></li>
                @if(Session::has('user_info'))
                    <li><a href="{{ route('user', ['id' => Session::get('user_info')[0]]) }}">
                            {{ Session::get('user_info')[1] }}
                        </a>
                    </li>
                    <li><a href="{{ route('exit') }}">注销</a></li>
                @else
                    <li><a href="#signin" uk-toggle>登录</a></li>
                    <li><a href="#signup" uk-toggle>注册</a></li>
                @endif

    </ul>

    <form action="">
            <input type="text" placeholder="Search..."  class="uk-input uk-form-width-small">
            <button class="uk-button uk-button-primary">搜索</button>
    </form>

        
    </div>
    </div>
@show

{{--如果是index页面则显示这两个导航--}}
@if(Request::getPathInfo() == '/index')

    @section('header_nav_slide')
        {{--轮播--}}
        <div class="uk-inline uk-visible-taggle uk-light" style="width: 100%;">
            <img src="{{ asset('static/asset/img/1.jpg') }}" style="width: 100%;">
            <a href="#" class="uk-position-center-left uk-position-small uk-hidden-hover uk-slidenav-large" uk-slidenav-previous></a>
            <a href="#" class="uk-position-center-right uk-position-small uk-hidden-hover uk-slidenav-large" uk-slidenav-next></a>
        </div>
    @show

@endif

@if(strpos(Request::getPathInfo(), 'index'))
    @section('header_nav_class')
    @show
@endif

{{--主要内容--}}

@yield('content')

{{--底部--}}
@section('footer')

    <footer class="ibee-footer">

        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-2 uk-text-left">
                    &copy 2017 iBeiKe
                </div>
                <div class="uk-width-1-2 uk-text-right">
                    <a href="#user-terms" uk-toggle>用户协议</a>
                    <a href="#">反馈</a>
                    <!-- This is an anchor toggling the modal -->

<!-- This is the modal -->
<div id="user-terms" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">用户协议</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p class="uk-text-right">
            <button class="uk-button uk-button-primary uk-modal-close" type="button">了解</button>
        </p>
    </div>
</div>
                </div>
            </div>
        </div>

    </footer>
@show

{{--返回顶端--}}
@section('back_to_top')
    <div id="ibee-back-to-top">
        <a id="toTopButton"><i class="fa fa-arrow-up fa-5x"></i></a>
    </div>
@show

@include('common.sign')
</body>
</html>