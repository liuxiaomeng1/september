<?php

namespace App\Http\Controllers\school;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Activity;

class ActivityController extends Controller
{
    //活动添加
    public function add()
    {
        $data=Activity::where(['p_id'=>0])->get();
        return view('a/add',['data'=>$data]);
    }

    public function add_do()
    {
        $data = request()->all();
//        dd($data);
        $res = Activity::insert($data);
        if ($res) {
            echo "<script>alert('恭喜你成功添加一条数据了哦！');location.href='/a/index';</script>";
        } else {
            echo "<script>alert('添加失败了呢，再来一次吧！');location.href='/a/index';</script>";
        }
    }

    public function index()
    {
        $info=Activity::count();
//        dd($info);
        $data=Activity::get()->toArray();
        $res=Activity::createTree($data);
        return view('a/index',['data'=>$res,'info'=>$info]);
    }
}
