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
