<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Navs;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CommonController extends Controller
{
    //自定义导航共享到所有页面
    public function __construct()
    {
        $navs = Navs::all();
        View::share('navs',$navs);
    }
}
