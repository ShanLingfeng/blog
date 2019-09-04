<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

//公共方法
class WordController extends Controller
{
    //下载成word格式
    public function word($art_id)
    {
        dd($art_id);die;
    }
}
