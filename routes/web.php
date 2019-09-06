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


//Route::any('/teachar','TeacherController@add');