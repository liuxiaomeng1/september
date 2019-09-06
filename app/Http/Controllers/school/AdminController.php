<?php

namespace App\Http\Controllers\school;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $u_id=session('u_id');
//        dd($u_id);
        return view('/admin/index');
    }
}
