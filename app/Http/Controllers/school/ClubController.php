<?php

namespace App\Http\Controllers\school;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Club;

class ClubController extends Controller
{
    public function add()
    {
        return view('club/add');
    }

    public function add_do(Request $request)
    {
        $data=request()->all();
//        dd($data);
        // //文件上传
        if($request->hasFile('r_img')){
            $file=$this->upload($request,'r_img');
            if($file['code']){
                $data['r_img']=$file['img_url'];
            }
        }else{
            return ['图片上传失败'];
        }
        $res=Club::insert($data);
//        dd($res);
        if($res){
            echo "<script>alert('添加成功');location.href='/club/index';</script>";
        }else{
            echo "<script>alert('添加失败');location.href='/club/index';</script>";
        }
    }

    public function upload(Request $request,$file)
    {
        if($request->file($file)->isValid()){
            $photo = $request->file($file);
            $store_result = $photo->store(date('Ymd'));
            return['code'=>1,'img_url'=>$store_result];
        }else{
            return['code'=>0,'message'=>'图片上传失败'];
        }
    }

    public function index()
    {
        $info=Club::count();
        $data=Club::get();
        return view('club/index',['data'=>$data,'info'=>$info]);
    }

    public function del()
    {
        $r_id=request()->r_id;
//        dd($r_id);
        $data=Club::where(['r_id'=>$r_id])->delete();
        if($data){
            echo "<script>alert('成功删除一条数据哦❥(^_-)');location.href='/club/index';</script>";
        }else{
            echo "<script>alert('不好意思再试一次吧！');location.href='/club/index';</script>";
        }
    }

}
