<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// 基础路由
Route::get('/', function () {
    return view('welcome');
});
Route::post('basic1',function () {
    return 'laravel so ga';
});
//多请求路由
Route::match(['get','post'], 'multy1',function () {
   return 'multy1';
});
Route::any('multy2',function () {
    return 'multy2';
});
//路由参数
//Route::get('user/{id}', function ($id) {
//    return 'user-id-' . $id;
//});
//Route::get('user/{name?}', function ($name = 'Tom') {
//    return 'user-name-' . $name;
//}) ->where('name', '[A-Za-z]+');
Route::get('user/{id}/{name?}', function ($id, $name = 'Tom') {
    return 'user-id-'.$id. '-name-' .$name;
}) ->where([ 'id' => '[0-9]+' ,'name'=> '[A-Za-z]+']);//正则匹配
// 路由别名
Route::get('user/center',['as' => 'center', function() {
   return route('center');
}]);
// 路由群组
Route::group(['prefix' => 'auth'], function () {
    Route::get('user/center', function () {
        return route('center');
    });

    Route::any('multy2',function () {
        return 'auth-multy2';
    });
});
// 路由中输出视图
Route::get('view', function () {
    return view('welcome');
});
// Route::get('member/{id}', 'MemberController@info');
Route::get('member/{liubin}', ['uses' => 'MemberController@info']);
// Route::any('test1',[])
Route::get('test1', ['uses' => 'StudentController@test1']);
Route::get('query1', ['uses' => 'StudentController@query1']);
Route::get('orm1', ['uses' => 'StudentController@orm1']);
Route::get('orm2', ['uses' => 'StudentController@orm2']);
Route::get('orm3', ['uses' => 'StudentController@orm3']);
Route::get('section1', ['uses' => 'StudentController@section1']);
Route::get('url', ['as' => 'url', 'uses' => 'StudentController@urlTest']);
Route::get('request1', ['uses' => 'StudentController@request1']);
Route::group(['middleware' => 'web'], function () {
  Route::any('session1', ['uses' => 'StudentController@session1']);
  Route::any('session2', ['uses' => 'StudentController@session2']);
});
Route::get('response1', ['uses' => 'StudentController@response1']);
// 中间件
Route::get('activity0', ['uses' => 'StudentController@activity0']);
Route::group(['middleware' => ['Activity']], function(){
  Route::get('activity1', ['uses' => 'StudentController@activity1']);
  Route::get('activity2', ['uses' => 'StudentController@activity2']);
});
