@extends('layouts.shop')
@section('content')

    <div class="wrapper">
    @include('layouts.left')
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form" enctype="multipart/form-data" action="/club/add_do" method="post">
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>俱乐部中文名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="r_cname" name="r_cname"
                               autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red"></span>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>俱乐部英文名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="r_ename" name="r_ename"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                        <span class="x-red">*</span>俱乐部简述
                    </label>
                    <div class="layui-input-inline">
                        <textarea name="r_sketch" id="r_sketch" class="layui-textarea"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_pass" class="layui-form-label">
                        <span class="x-red">*</span>俱乐部图片
                    </label>
                    <div class="layui-input-inline">
                        <input type="file" name="r_img" id="">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <input type="submit" value="添加" class="layui-btn">
                </div>
            </form>
            <!-- 右侧内容框架，更改从这里结束 -->
    </div>
@endsection