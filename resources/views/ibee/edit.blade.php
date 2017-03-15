@extends('common.layouts')

@section('reference')

    <link rel="stylesheet" href="{{ asset('static/css/uikit3.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('static/asset/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('static/css/ibee-navbar.css') }}">
    <script src="{{ asset('static/js/jquery.min.js') }}"></script>
    <script src="{{ asset('static/js/uikit3.min.js') }}"></script>
    <script src="{{ asset('static/js/script.js') }}"></script>


    <!-- about the text editor -->
    <link href="https://cdn.quilljs.com/1.2.0/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.2.0/quill.js"></script>
    <!-- end -->

@stop

@section('style')

    <style>
        .ibee-above-the-editor{
            margin: 40px 0;
        }
        .ibee-above-the-editor span{
            font-size: 2.5em;
            line-height: 40px;
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

    </style>

@stop

@section('content')
    <div class="uk-container uk-container-center">
        <div class="ibee-above-the-editor">
            <span>想写点啥？</span>
            <div class="ibee-button-group uk-align-right">
                <button id="save_draft" class="uk-button uk-button-primary">
                    <a style="text-decoration: none; color: inherit;">存为草稿</a>
                    {{--<a id="save_draft" href="{{ route('save_as_draft') }}" style="text-decoration: none; color: inherit;">存为草稿</a>--}}
                </button>
                <button id="submit_article" class="uk-button uk-button-success">提交</button>
                <button class="uk-button uk-button-danger">
                    <a href="{{ route('index') }}" style="text-decoration: none; color: inherit;">
                        放弃
                    </a>
                </button>
            </div>
        </div>

        {{--富文本编辑器界面--}}
        <div id="ibee-title" style="font-size: 1.3em; border: 1px solid #ccc;"></div>

        <br/><br/><br/>

        <form action="" class="uk-form">
                <div class="test-upload uk-placeholder uk-text-center">
                    <span uk-icon="icon: cloud-upload"></span>
                    <span class="uk-text-middle">点击上传或拖拽封面图片</span>
                    <div uk-form-custom>
                        <input type="file" multiple>
                        <span class="uk-link">选择图片</span>
                    </div>
                </div>

                <progress id="progressbar" class="uk-progress" value="0" max="100" hidden></progress>

                <script>

                (function ($) {

                    var bar = $("#progressbar")[0];

                    UIkit.upload('.test-upload', {

                        url: '',
                        multiple: true,

                        beforeSend: function() { console.log('beforeSend', arguments); },
                        beforeAll: function() { console.log('beforeAll', arguments); },
                        load: function() { console.log('load', arguments); },
                        error: function() { console.log('error', arguments); },
                        complete: function() { console.log('complete', arguments); },

                        loadStart: function (e) {
                            console.log('loadStart', arguments);

                            bar.removeAttribute('hidden');
                            bar.max =  e.total;
                            bar.value =  e.loaded;
                        },

                        progress: function (e) {
                            console.log('progress', arguments);

                            bar.max =  e.total;
                            bar.value =  e.loaded;

                        },

                        loadEnd: function (e) {
                            console.log('loadEnd', arguments);

                            bar.max =  e.total;
                            bar.value =  e.loaded;
                        },

                        completeAll: function () {
                            console.log('completeAll', arguments);

                            setTimeout(function () {
                                bar.setAttribute('hidden', 'hidden');
                            }, 1000);

                            alert('Upload Completed');
                        }
                    });

                })(jQuery);

                </script>
            
            <div class="uk-margin">
            <label class="uk-form-label" for="form-stacked-select">选择分类</label>
                <div class="uk-form-controls">
                    <select class="uk-select uk-form-width-small" id="form-stacked-select">
                        <optgroup label="请选择分类">
                            <option>科技</option>
                            <option>游戏</option> 
                        </optgroup>
                        
                    </select>
                </div>
            </div>
        </form>
        

        <br/><br/><br/>
        <div id="editor" style="font-size: 1.3em">
        </div>
    </div>

    <script>
        var quill_title = new Quill('#ibee-title', {
            modules: {
                toolbar: []
            },
            placeholder: '文章标题'
        });

        var quill = new Quill('#editor', {
            modules: {
                //formula: true,
                toolbar: [
                    //[{ 'size': ['small', false, 'large', 'huge'] }],
                    [{ 'header': [1, 2, 3, false] }],

                    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                    ['link', 'blockquote', 'code-block'],

                    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],

                    [{ 'color': [] }],          // dropdown with defaults from theme
                    [{ 'align': [] }],

                    //['formula'],
                ],
                history: {
                    delay: 2000,
                    maxStack: 500,
                    userOnly: true
                }
            },
            theme: 'snow',
            placeholder: '正文部分'
        });

        $("#submit_article").click(function () {
            var article_delta = quill.getContents();
            var article_contents = JSON.stringify(article_delta, null, 2);
            console.log(article_contents);
            $.ajax({
                url: 'article_submit',
                type: 'post',
                dataType : "JSON",
                data: {content: article_contents},
                success: function (data) {
                    alert("提交成功！");
                    quill.setContents(data);
                },
                error: function () {
                    alert("提交失败");
                }

            });
        });

        $("#save_draft").click(function () {
            var draft_delta = quill.getContents();
            var draft_contents = JSON.stringify(draft_delta, null, 2);
            console.log(draft_contents);
            $.ajax({
                url: 'save_draft',
                type: 'post',
                dataType : "JSON",
                data: {content: draft_contents},
                success: function (data) {
                    alert("提交成功！");
                    quill.setContents(data);
                },
                error: function () {
                    alert("提交失败");
                }

            });
        });


    </script>
@stop

@section('footer')

@stop
