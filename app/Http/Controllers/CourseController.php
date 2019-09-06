<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Teacher;
use App\Model\Course;
class CourseController extends Controller
{
    public function index()
    {
        return view('public.index');
    }

    public function course_list()
    {
        //dd($_SERVER);
        $way = $_SERVER['SERVER_NAME'];
        $head = $_SERVER['REQUEST_SCHEME'];
        $pageSize=config('app.pageSize');
        $res = Course::join("teacher","course.t_id","=","teacher.t_id")->orderBy('c_id','desc')->paginate($pageSize);
        $count = Course::count();//
        //dd($count);
        return view('course.list',compact('res','count','way','head'));
    }

    //无限极分类
    function getCateInfo($cateInfo,$pid=0,$level=0){
        static $arr=[];
        foreach ($cateInfo as $k=>$v){
            if($v['t_show']==$pid){
                $v['level']=$level;
                $arr[]=$v;
                $this->getCateInfo($cateInfo,$v['t_id'],$v['level']+1);
            }
        }
        return $arr;
    }

    public function course_add()
    {
        $cate=new Teacher();
        $data =$cate->get();
        $dd=$this->getCateInfo($data);
        //dd($dd);
        //dd($t_name);
        return view('course.add',compact('dd'));
    }

    public function course_add_do(Request $request)
    {
        if($request->isMethod('post')){
            if(!$request->hasFile('fodder_file') || !$request->file('fodder_file')->isValid()){
            }
        $name = 'c_img';
        //var_dump($name);die;
        //上传图片到本地
        $photo = $request->file($name);
        //var_dump($photo);die;
        $extension=$request->$name->getClientOriginalExtension();
        //dd($extension);
        $store_result=$photo->storeAs("school_img/".date('Ymd'),date('YmdHis').rand(100,999).'.'.$extension);
        //dd($store_result);
        //$media_path = public_path()."/school_img/".$store_result;
        //$path = "school_img/".$store_result;
        //dd($path);
        $post = request()->all();
       // dd($post);
        $insert = [
            'c_name'=>$post['c_name'],
            'c_price'=>$post['c_price'],
            'c_describe'=>$post['c_describe'],
            'c_sketch'=>$post['c_sketch'],
            'c_min'=>$post['c_min'],
            'c_max'=>$post['c_max'],
            'c_program'=>$post['c_program'],
            'c_introduce'=>$post['c_introduce'],
            'c_img'=>$store_result,
            'c_number'=>$post['c_number'],
            't_id'=>$post['t_id'],
            'c_show'=>$post['c_show']
        ];
        //dd($insert);
        $res = Course::create($insert);
        //dd($res);
        if($res){
            echo"<script>alert('添加成功');location.href='/course_list'</script>";

        }else{
            echo"<script>alert('添加失败');location.href='/course_add'</script>";
        }

        }
    }

    public function course_del()
    {
        $post = request()->all();
        //dd($post);
        $res=Course::where('c_id',$post['c_id'])->delete();
        if($res){
            echo"<script>alert('删除成功');location.href='/course_list'</script>";

        }else{
            echo"<script>alert('删除失败');location.href='/course_list'</script>";
        }
    }

    public function Batchdelete()
    {
        $post = request()->all();
        //dd($post);
        $int = explode(',',$post['c_id']);
        //dd($int);
        $res=Course::destroy($int);
        //dd($res);
        if($res){
            echo json_encode(['ret'=>3,'msg'=>'删除成功']);
        }else{
            echo json_encode(['ret'=>4,'msg'=>'删除失败']);
        }
    }


}
