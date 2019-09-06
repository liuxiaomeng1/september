<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    //不被打上时间戳
    public $timestamps = false;
    //定义表名
    protected $table = 'login';

    //定义主键id
//    protected $primaryKey='r_id';
}
