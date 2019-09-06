<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //不被打上时间戳
    public $timestamps = false;
    //定义表名
    protected $table = 'activity';

    //定义主键id
    protected $primaryKey='a_id';

    public  static function createTree($data,$p_id=0,$level=0)
    {
        if (!$data || !is_array($data)) {
            return;
        }
        static $arr=[];
        foreach ($data as $k=>$v){
            //dd($v);
            if ($v['p_id']==$p_id){

                $v['level']=$level;
                $arr[]=$v;
                self::createTree($data,$v['a_id'],$level+1);
            }
        }
        return $arr;

    }
}
