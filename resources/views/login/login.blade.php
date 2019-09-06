<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>登录页面</title>
    <link type="text/css" rel="stylesheet" href="/css/css.css"/>
</head>
<body>
<form>
    <table>
        <tr>
            <td>
                用&nbsp;&nbsp;户&nbsp;名:&nbsp;&nbsp;<input type="text" id="username" name="username"/>
            </td>
            <td class="right">
                <span ><p id="un"> </p></span>
            </td>
        </tr>
        <tr>
            <td>
                设置密码:&nbsp;&nbsp;<input type="password" id="password1" name="password"/>
            </td>
            <td class="right">
                <span><p id="p1"> </p></span>
            </td>
        </tr>
        <tr>
            <td>
                <input id="submit" type="button" value="提交"/>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{url('login/forgetpwd')}}"><input id="reset" type="button" value="忘记密码"></a>
            </td>
            <td class="right">

            </td>
        </tr>
    </table>
</form>

<script type="text/javascript" src="/js/script.js"></script>
</body>
</html>
<script src="/js/jquery.min.js"></script>
<script>
    $(function(){
        $("#submit").click(function(){
            var name=$("#username").val();
            var password=$("#password1").val();

            $.ajax({
                url:"{{url('login/dologin')}}",
                data:{name:name,password:password},
                dataType:"JSON",
                type:"POST",
                success:function(res){
//                    console.log(res);
                    if(res.code==1){
                        alert(res.msg);
                        location.href="{{url('/admin/index')}}";
                    }else{
                        alert(res.msg);
                    }
                }
            })
        })
    })
</script>