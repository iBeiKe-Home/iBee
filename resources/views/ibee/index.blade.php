@extends('common.layouts')

@section('header_nav_class')
    {{--分类导航--}}
    <div class="uk-container ">
        <div class="ibee-horizon-menu uk-width-1-1 "><div class="uk-grid">
                <div class="uk-width-auto">
                    <a href="{{ route('index') }}" style="color: inherit;">
                        <span>
                            全部
                        </span>
                    </a>
                </div>
                <div class="uk-width-expand ibee-horizon-menu-detail uk-text-center">
                    <ul>
                        <li><a href="{{ route('tag', ['tag_class' => 10]) }}" style="color: inherit;">科技</a></li>
                        <li><a href="{{ route('tag', ['tag_class' => 15]) }}" style="color: inherit;">游戏</a></li>
                        <li><a href="{{ route('tag', ['tag_class' => 20]) }}" style="color: inherit;">生活</a></li>
                        <li><a href="{{ route('tag', ['tag_class' => 25]) }}" style="color: inherit;">摄影</a></li>
                        <li><a href="{{ route('tag', ['tag_class' => 30]) }}" style="color: inherit;">旅行</a></li>
                        <li><a href="{{ route('tag', ['tag_class' => 35]) }}" style="color: inherit;">健身</a></li>
                        <li><a href="{{ route('tag', ['tag_class' => 40]) }}" style="color: inherit;">时尚</a></li>
                        <li><a href="{{ route('tag', ['tag_class' => 45]) }}" style="color: inherit;">影视</a></li>
                        <li><a href="{{ route('tag', ['tag_class' => 50]) }}" style="color: inherit;">资源</a></li>
                        <li><a href="{{ route('tag', ['tag_class' => 55]) }}" style="color: inherit;">其他</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    {{--文章内容--}}
    <div class="ibee-content">
        <div class="uk-container">
            @foreach($ibee_article_info as $article)
                <div class="uk-width-5-6  ibee-article uk-align-center">
                    <div class="ibee-article-author-date">
                        <a href="{{ route('user', ['id' => 1]) }}"><img src="{{ asset('static/asset/img/gravatar.png') }}" class="author-gravatar"></a>
                        <span class="author-id">{{ $article->nickname }}</span>
                        <time><span>{{ date('Y年m月d日 H:i', $article->created_at) }}</span></time>
                    </div>
                    <div class="ibee-article-img">
                        <a href="{{ route('article', ['articleid' => $article->articleid]) }}"><img src="{{ asset('static/asset/img/article_img.jpg') }}"></a>
                    </div>
                    <div class="ibee-article-title">
                        <a href="{{ route('article', ['articleid' => $article->articleid]) }}"><h1>{{ $article->title }}</h1></a>
                    </div>
                    <div class="ibee-article-info">
                        <div class="uk-label"><span>{{ $article->getTag($article->tag) }}</span></div>
                        <div class="article-likes">
                            <i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i><span>{{ $article->like }}</span>
                        </div>
                        <div class="article-comments">
                            <i class="fa fa-comments fa-2x" aria-hidden="true"></i><span>{{ $article->comment }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        {{--分页--}}
        <div style="height: 60px;background: #F2F2F2;padding: 40px;">
            <div class="uk-container uk-align-center">
                <ul class="uk-width-5-6 uk-pagination uk-flex-center">
                    {!! $ibee_article_info->render() !!}
                </ul>
            </div>
        </div>
    </div>

    <script>

        window.onload = function () {

        }

    </script>
@stop
@include('common.sign')

