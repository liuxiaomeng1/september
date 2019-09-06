@extends('layouts.shop')
@section('content')

    <div class="wrapper">
    @include('layouts.left')
    <!-- 右侧内容框架，更改从这里开始 -->
        <!-- 右侧内容框架，更改从这里开始 -->
        <form class="layui-form xbs" action="" >
            <div class="layui-form-pane" style="text-align: center;">
                <div class="layui-form-item" style="display: inline-block;">
                </div>
            </div>
        </form>
        <xblock>
            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button>
            <a class="layui-btn" href="{{url('a/add')}}"><i class="layui-icon">&#xe608;</i>添加</a><span class="x-right" style="line-height:40px">共有数据：{{$info}}条</span></xblock>
        <table class="layui-table">
            <thead>
            <tr>
                <th>
                    <input type="checkbox" name="" value="">
                </th>
                <th>
                    ID
                </th>
                <th>
                    活动名称
                </th>
                <th>
                    层级分类
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
                <tr>
                    <td>
                        <input type="checkbox" value="1" name="">
                    </td>
                    <td>
                        {{$v['a_id']}}
                    </td>
                    <td>
                        {{str_repeat('-|',$v['level'])}}{{$v['a_name']}}
                    </td>
                    <td >
                        {{$v['p_id']}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- 右侧内容框架，更改从这里结束 -->
    </div>
    <!-- 背景切换开始 -->
    <div class="bg-changer">
        <div class="swiper-container changer-list">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img class="item" src="./images/a.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/b.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/c.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/d.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/e.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/f.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/g.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/h.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/i.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="./images/j.jpg" alt=""></div>
                <div class="swiper-slide"><span class="reset">初始化</span></div>
            </div>
        </div>
        <div class="bg-out"></div>
        <div id="changer-set"><i class="iconfont">&#xe696;</i></div>
    </div>
    <!-- 底部结束 -->
@endsection
