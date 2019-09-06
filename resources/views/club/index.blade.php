@extends('layouts.shop')
@section('content')

    <div class="wrapper">
    @include('layouts.left')
    <!-- 右侧内容框架，更改从这里开始 -->
     <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="" >
                <div class="layui-form-pane" style="text-align: center;">
                    <div class="layui-form-item" style="display: inline-block;">
                    </div>
                </div>
            </form>
            <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button>
                <a class="layui-btn" href="{{url('club/add')}}"><i class="layui-icon">&#xe608;</i>添加</a><span class="x-right" style="line-height:40px">共有数据：{{$info}}条</span></xblock>
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
                        俱乐部中文名
                    </th>
                    <th>
                        俱乐部英文名
                    </th>
                    <th>
                        俱乐部简述
                    </th>
                    <th>
                        俱乐部图片
                    </th>
                    <th>
                        操作
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
                        {{$v['r_id']}}
                    </td>
                    <td>
                        {{$v['r_cname']}}
                    </td>
                    <td >
                        {{$v['r_ename']}}
                    </td>
                    <td>
                        {{str_limit($v['r_sketch'],50,'....')}}
                    </td>
                    <td>
                        <img src="/{{$v['r_img']}}" width="80px">
                    </td>
                    <td class="td-manage">
                        <a title="编辑" href="javascript:;" onclick="level_edit('编辑','level-edit.html','4','','300')"
                           style="text-decoration:none">
                            <i class="layui-icon">&#xe642;</i>
                        </a>
                        <a title="删除" href="{{url('club/del?r_id='.$v['r_id'])}}" onclick="level_del(this,'1')"
                           style="text-decoration:none">
                            <i class="layui-icon">&#xe640;</i>
                        </a>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
            </div>
        </div>
        <!-- 右侧主体结束 -->
        </div>
    <!-- 背景切换开始 -->
   
<!-- 底部结束 -->
@endsection
