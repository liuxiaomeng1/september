@extends('layouts.shop')
<link rel="stylesheet" href="./css/app.css">
    @section('content')

<div class="wrapper">
        <!--左侧导航开始-->
         @include('layouts.left')
         <!--左侧导航结束-->
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form xbs" action="" >
                <div class="layui-form-pane" style="text-align: center;">
                  <div class="layui-form-item" style="display: inline-block;">
                    <label class="layui-form-label xbs768">日期范围</label>
                    <div class="layui-input-inline xbs768">
                      <input class="layui-input" placeholder="开始日" id="LAY_demorange_s">
                    </div>
                    <div class="layui-input-inline xbs768">
                      <input class="layui-input" placeholder="截止日" id="LAY_demorange_e">
                    </div>
                    <div class="layui-input-inline">
                      <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                  </div>
                </div>
            </form>
            <xblock><button class="layui-btn layui-btn-danger" id="delete" ><i class="layui-icon">&#xe640;</i>批量删除</button><button class="layui-btn" onclick="member_add('添加用户','member-add.html','600','500')"><i class="layui-icon">&#xe608;</i>添加</button><span class="x-right" style="line-height:40px">共有数据：{{$count}} 条</span></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" value="选择" id="allbox"/>
                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            课程名称
                        </th>
                        <th>
                            课程售价
                        </th>
                        <th>
                            课程简述
                        </th>
                        <th>
                            用户最小适应范围
                        </th>
                        <th>
                            用户最大适应范围
                        </th>
                        <th>
                            课程图片
                        </th>
                        <th>
                            课程库存
                        </th>
                        <th>
                            课程老师
                        </th>
                        <th>
                            是否上架
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($res as $k=>$v)
                    <tr c_id="{{$v['c_id']}}">
                        <td >
                            <input type="checkbox" class="box" />
                        </td>
                        <td>
                            {{$v['c_id']}}
                        </td>
                        <td>
                            <u style="cursor:pointer" onclick="member_show('张三','member-show.html','10001','360','400')">
                                {{$v['c_name']}}
                            </u>
                        </td>
                        <td >
                            {{$v['c_price']}}
                        </td>
                        <td >
                            {{$v['c_sketch']}}
                        </td>
                        <td >
                            {{$v['c_min']}}
                        </td>
                        <td>
                            {{$v['c_max']}}
                        </td>
                        <td>
                            <img src="{{$head}}://{{$way}}/{{$v['c_img']}}" width="60" height="60" />
                        </td>
                        <td>
                            {{$v['c_number']}}
                        </td>
                        <td>
                            {{$v['t_name']}}
                        </td>
                        <td>
                            @if($v['c_show']==0)下架@else上架@endif
                        </td>
                        <td class="td-manage">
                            <a style="text-decoration:none" onclick="member_stop(this,'10001')" href="javascript:;" title="停用">
                                <i class="layui-icon">&#xe601;</i>
                            </a>
                            <a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-edit.html','4','','510')"
                            class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a style="text-decoration:none"  onclick="member_password('修改密码','member-password.html','10001','600','400')"
                            href="javascript:;" title="修改密码">
                                <i class="layui-icon">&#xe631;</i>
                            </a>
                            <a title="删除" href="/course_del?c_id={{$v['c_id']}}"
                            style="text-decoration:none">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$res->links()}}
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
</div>

<script>

        layui.use(['laydate'], function(){
          laydate = layui.laydate;//日期插件

          //以上模块根据需要引入
          //



          var start = {
            min: laydate.now()
            ,max: '2099-06-16 23:59:59'
            ,istoday: false
            ,choose: function(datas){
              end.min = datas; //开始日选好后，重置结束日的最小日期
              end.start = datas //将结束日的初始值设定为开始日
            }
          };

          var end = {
            min: laydate.now()
            ,max: '2099-06-16 23:59:59'
            ,istoday: false
            ,choose: function(datas){
              start.max = datas; //结束日选好后，重置开始日的最大日期
            }
          };

          document.getElementById('LAY_demorange_s').onclick = function(){
            start.elem = this;
            laydate(start);
          }
          document.getElementById('LAY_demorange_e').onclick = function(){
            end.elem = this
            laydate(end);
          }

        });

        //批量删除提交
         function delAll () {
            layer.confirm('确认要删除吗？',function(index){
                //捉到所有被选中的，发异步进行删除
                layer.msg('删除成功', {icon: 1});
            });
         }
         /*用户-添加*/
        function member_add(title,url,w,h){
            x_admin_show(title,url,w,h);
        }
        /*用户-查看*/
        function member_show(title,url,id,w,h){
            x_admin_show(title,url,w,h);
        }

         /*用户-停用*/
        function member_stop(obj,id){
            layer.confirm('确认要停用吗？',function(index){
                //发异步把用户状态进行更改
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="layui-icon">&#xe62f;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-disabled layui-btn-mini">已停用</span>');
                $(obj).remove();
                layer.msg('已停用!',{icon: 5,time:1000});
            });
        }

        /*用户-启用*/
        function member_start(obj,id){
            layer.confirm('确认要启用吗？',function(index){
                //发异步把用户状态进行更改
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="layui-icon">&#xe601;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>');
                $(obj).remove();
                layer.msg('已启用!',{icon: 6,time:1000});
            });
        }
        // 用户-编辑
        function member_edit (title,url,id,w,h) {
            x_admin_show(title,url,w,h);
        }
        /*密码-修改*/
        function member_password(title,url,id,w,h){
            x_admin_show(title,url,w,h);
        }
        /*用户-删除*/
        function member_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                //发异步删除数据
                $(obj).parents("tr").remove();
                layer.msg('已删除!',{icon:1,time:1000});
            });
        }
        </script>
        <script>
        //百度统计可去掉
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
          var s = document.getElementsByTagName("script")[0];
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
<link rel="stylesheet" href="https://cdn.bootcss.com/Swiper/3.4.2/css/swiper.min.css">
<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
<script>
    $("#allbox").click(function(){
            var status=$(this).prop('checked');
            $(".box").prop('checked',status);
        });
    //点击批删
        $(document).on('click','#delete',function(){
            //获取选中的复选框的商品id
            var _box=$(".box");
            //alert(_box);
            //console.log(_box);
            var c_id='';
            _box.each(function(index){
                if($(this).prop('checked')==true){
                    c_id+=$(this).parents('tr').attr('c_id')+',';
                    //console.log(c_id);
                }
            });
            c_id=c_id.substr(0,c_id.length-1);
            //alert(c_id);return;
            //把商品id传给控制器
            $.ajax({
                //alert(1);die;
                url:"{{url('/Batchdelete')}}",
                type:"POST",
                data:{c_id:c_id},
                dataType:"json",
                success:function(res){
                    if(res.ret==3){
                        location.href="{{url('/course_list')}}";
                    }
                }
            })
        })
    </script>
@endsection