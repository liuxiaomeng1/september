<?php

namespace App\Http\Controllers\school;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Login;

class LoginController extends Controller
{
    public function login()
    {
        return view('login/login');
    }

    public function dologin()
    {
        $name=request()->name;
        $password=request()->password;
//        dd(md5($password));
//        $password1=request()->password1;
//        dd($name);

        $res=Login::where(['username'=>$name,'password'=>md5($password)])->first()->toArray();
//        dd($res);
        if(!$res){
            return ['code'=>0,'msg'=>'用户名或密码输入有误'];
        }else{
            session(['u_id'=>$res['id']]);
            return ['code'=>1,'msg'=>'恭喜亲亲，成功登录呦'];
        }
    }

    //忘记密码
    public function forgetpwd()
    {
        return view('login/forgetpwd');
    }

    public function forget()
    {
        $name=request()->name;
        $pwd=request()->pwd;
//        dd($name);

        $info=Login::where(['username'=>$name])->first();
        if($info){
            $res=Login::where(['username'=>$name])->update(['password'=>md5($pwd)]);
            return ['code'=>1,'msg'=>'修改成功呦'];
        }else{
            return ['code'=>0,'msg'=>'请输入正确的用户名'];
        }
    }
}
