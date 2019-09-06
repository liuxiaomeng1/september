
@extends('layouts.shop')
    @section('content')
<div class="wrapper">
        <!--左侧导航开始-->
         @include('layouts.left')

        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <form class="layui-form" action="{{url('/course_add_do')}}" method="post" enctype="multipart/form-data">
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        课程名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="c_name" required
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        课程价格
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="c_price" required lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>

                </div>
                <div class="layui-form-item">
                    <label for="L_city" class="layui-form-label">
                        课程简述
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_city" name="c_sketch" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                <div class="layui-inline">
                  <label class="layui-form-label">适应范围</label>
                  <div class="layui-input-inline" style="width: 100px;">
                    <input type="text" name="c_min" placeholder="" autocomplete="off" class="layui-input">
                  </div>
                  <div class="layui-form-mid">-</div>
                  <div class="layui-input-inline" style="width: 100px;">
                    <input type="text" name="c_max" placeholder="" autocomplete="off" class="layui-input">
                  </div>
                </div>
              </div>
                <div class="layui-form-item">
                    <label for="L_city" class="layui-form-label">
                        课程库存
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_city" name="c_number" autocomplete="off"
                        class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label for="L_sign" class="layui-form-label">
                        课程介绍
                    </label>
                    <div class="layui-input-block">
                        <textarea placeholder="请介绍您的课程" id="L_sign" name="c_introduce" autocomplete="off"
                        class="layui-textarea" style="height: 80px;"></textarea>
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label for="L_sign" class="layui-form-label">
                        课程目标
                    </label>
                    <div class="layui-input-block">
                        <textarea placeholder="请定义您的课程目标" id="L_sign" name="c_program" autocomplete="off"
                        class="layui-textarea" style="height: 80px;"></textarea>
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label for="L_sign" class="layui-form-label">
                        课程描述
                    </label>
                    <div class="layui-input-block">
                        <textarea placeholder="请描述您的课程信息" id="L_sign" name="c_describe" autocomplete="off"
                        class="layui-textarea" style="height: 80px;"></textarea>
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label for="L_sign" class="layui-form-label">
                        选择教师
                    </label>
                    <div class="layui-input-block">
                    <select name="t_id">
                        @foreach ($first as $k=>$v)
                          <option value="{{$v->t_id}}">{{$v->t_name}}</option>
                        @endforeach
                      </select>
                    </div>
                </div>


                 <div class="layui-form-item layui-form-text">
                    <label for="L_sign" class="layui-form-label">
                        选择课程图片
                    </label>
                    <div class="form-group">
                    <input type="file" id="exampleInputFile" name="c_img">
                  </div>
                </div>

                <div class="layui-form-item">
                <label class="layui-form-label">是否上架</label>
                <div class="layui-input-block">
                  <input type="radio" name="c_show" value="0" title="下架" checked="">
                  <input type="radio" name="c_show" value="1" title="上架">
                </div>
              </div>
                <div class="layui-form-item">
                    <label for="L_sign" class="layui-form-label">
                    </label>
                    <button class="layui-btn" key="set-mine" lay-filter="save" lay-submit>
                        保存
                    </button>
                </div>
            </form>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
  </div>
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
    @endsection