<style>
            #modal-logo{
                display: block;
                margin: 0 auto;
                margin-bottom: -20px;
            }
            #signin legend{
                text-align: center;
                font-size: 2em;
            }
            #signup legend{
                text-align: center;
                font-size: 2em;
            }
</style>
{{--登录--}}
<div id="signin" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-width-1-2 uk-align-center">
            <img id="modal-logo" src="{{ asset('static/asset/img/logo2.png') }}" width="120px">
        </div>
        <center>
            <form action="{{ route('user_sign_in') }}" method="post">
                <fieldset class="uk-fieldset">
                    <legend>请使用iBeiKe账号登录</legend>
                    <hr class="uk-divider-icon">
                    <div class="uk-margin">
                            <input name="IbeeUserInfo[email]" class="uk-input uk-form-width-medium" type="text" placeholder="Email"> 
                    </div>
                    <div class="uk-margin">
                        <input name="IbeeUserInfo[password]" class="uk-input uk-form-width-medium" type="password" placeholder="Password">
                    </div>
                    <div id="uk-margin">
                        <button type="submit" class="uk-button uk-button-primary">登录</button>
                    </div>
                </fieldset>
            </form>
        </center>
    </div>
</div>

{{--注册--}}
<div id="signup" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-width-1-2 uk-align-center">
            <img id="modal-logo" src="{{ asset('static/asset/img/logo2.png') }}" width="120px">
        </div>
        <center>
        <form method="POST" action="{{ route('user_sign_up') }}" class="uk-form-horizontal">
            <fieldset class="uk-fieldset">
            <legend>欢迎注册iBee</legend>
            <hr class="uk-divider-icon">
                {{--{{ csrf_field() }}--}}
                <lable>
                    @if(count($errors))
                        {{ $errors->first() }}
                    @endif
                </lable>
                <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">用户名</label>
                        <div class="uk-form-controls"></div>
                        <input name="IbeeUserInfo[nickname]" {{--value="{{ old('IbeeUser')['nickname'] ? old('IbeeUser')['nickname'] : $students->age }}"--}}
                        class="uk-input uk-form-width-medium" type="text" placeholder="用户名">
                </div>
                <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">Email</label>
                        <input name="IbeeUserInfo[email]" class="uk-input uk-form-width-medium" type="email" placeholder="Email">
                </div>
                <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">密码</label>
                        <input name="IbeeUserInfo[password]" class="uk-input uk-form-width-medium" type="password" placeholder="密码">
                </div>
                <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">确认密码</label>
                        <input name="IbeeUserInfo[password_confirmation]" class="uk-input uk-form-width-medium" type="password" placeholder="请再输入一遍">
                </div>
                <hr>
                <div id="uk-margin">
                    <button type="submit" class="uk-button uk-button-primary">注册</button>
                </div>
            </fieldset>
        </form>
        </center>
    </div>
</div>