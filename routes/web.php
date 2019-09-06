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

Route::get('/', function () {
    return view('public/index');
});

//讲师模板
 Route::prefix('teacher')->group(function () {
     route::any('add','Teacher\\TeacherController@add');//讲师添加
     route::any('index','Teacher\\TeacherController@index');//讲师列表展示
     route::any('add_do','Teacher\\TeacherController@add_do');//添加执行

 });



Route::prefix('/admin')->middleware('login')->group(function(){
   route::any('index','school\\AdminController@index');
});

//俱乐部管理
Route::prefix('/club')->group(function(){
   route::any('add','school\\ClubController@add');
   route::any('add_do','school\\ClubController@add_do');
   route::any('index','school\\ClubController@index');
   route::any('del','school\\ClubController@del');
});

//俱乐部活动管理
Route::prefix('/a')->group(function(){
   route::any('add','school\\ActivityController@add');
   route::any('add_do','school\\ActivityController@add_do');
   route::any('index','school\\ActivityController@index');
});

//后台登录页面
Route::prefix('/login')->group(function(){
   route::any('login','school\\LoginController@login');
   route::any('dologin','school\\LoginController@dologin');
   route::any('forgetpwd','school\\LoginController@forgetpwd');
   route::any('forget','school\\LoginController@forget');
});

Route::any('/course_list','CourseController@course_list');
Route::any('/course_add','CourseController@course_add');
Route::any('/course_add_do','CourseController@course_add_do');
Route::any('/course_del','CourseController@course_del');
Route::any('/Batchdelete','CourseController@Batchdelete');

#专栏管理
Route::prefix('/fenlan')->group(function(){
    Route::get('add','FenlanController@add');//添加视图
    Route::any('doadd','FenlanController@doadd');//执行添加
    Route::any('lists','FenlanController@lists');//展示
    Route::any('del','FenlanController@del');//删除
    Route::any('update','FenlanController@update');//修改
    Route::any('doupdate','FenlanController@doupdate');//执行修改
});


//Route::any('/teachar','TeacherController@add');