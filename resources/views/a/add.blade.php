@extends('layouts.shop')
@section('content')

    <div class="wrapper">
    @include('layouts.left')
    <!-- 右侧内容框架，更改从这里开始 -->
        <form class="layui-form" action="/a/add_do" method="post">
            <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    <span class="x-red">*</span>活动名称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="a_name" name="a_name"
                           autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red"></span>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                    <span class="x-red">*</span>活动分类
                </label>
                <div class="layui-input-inline">
                    <select name="p_id">
                        <option value="0">--请选择--</option>
                        @foreach($data as $v)
                            <option value="{{$v['a_id']}}">{{$v['a_name']}}</option>
                        @endforeach
                    </select>
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