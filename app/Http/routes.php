<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
    Route::get('index', [
        'as' => 'index',
        'uses' => 'IndexController@show_index'
    ]);
    Route::post('user/signin', [
        'as' => 'user_sign_in',
        'uses' => 'UserController@user_sign_in'
    ]);
    Route::post('user/signup', [
        'as' => 'user_sign_up',
        'uses' => 'UserController@user_sign_up'
    ]);
    Route::get('article/{articleid}', [
        'as' => 'article',
        'uses' => 'IndexController@show_article'
    ]);
    Route::get('user/{id}', [
        'as' => 'user',
        'uses' => 'UserController@show_user'
    ]);
    Route::get('index/tag/{tag_class}', [
        'as' => 'tag',
        'uses' => 'IndexController@show_tag_content'
    ]);
    Route::get('post', [
        'as' => 'edit',
        'uses' => 'EditController@show_edit'
    ]);
    Route::any('save_draft', [
        'as' => 'save_as_draft',
        'uses' => 'EditController@save_as_draft'
    ]);
    Route::get('exit', [
        'as' => 'exit',
        'uses' => 'UserController@exit_ibee'
    ]);
    Route::any('article_submit', [
        'as' => 'article_submit',
        'uses' => 'EditController@article_submit'
    ]);
    Route::get('article/like/{articleid}', [
        'as' => 'article_like',
        'uses' => 'IndexController@article_like'
    ]);
    /*Route::get('test', [
        'uses' => 'IndexController@test'
    ]);*/
});
