<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

require_once 'resources\org\code\Code.class.php';

class LoginController extends CommonController
{
    //登录方法
    public function login()
    {
        //验证码验证
        if($input = Input::all()){
            //实例化验证码类
           $code2 = new \Code;
           //得到返回验证码字符串
            $code_ = $code2->get();
            //判断输入的验证码和返回的验证码是否一致
            if(strtoupper($input['code']) == $code_){
                //获取用户名、密码查询数据库是否有这个人
                $user_name=$input['user_name'];
                $user_pass=$input['user_pass'];
                $user = User::where('user_name',$user_name)->first();
                if($user->user_name == $input['user_name'] && Crypt::decrypt($user->user_pass) == $input['user_pass']){
                    session(['user'=>$user]);
                    return redirect('admin/index');
                }else{
                    return back()->with('msg','用户名或者密码错误！');
                }
            }else{
                return back()->with('msg','验证码错误！');
            }
        }else{

            return view('admin.login');
        }
    }
    //创建验证码验证码方法
    public function code()
    {
       //实例化code类
        $code = new \Code;
        //创建验证码
        echo $code->make();
    }

    public function quit()
    {
        //清除session值
        session(['user'=>null]);
        return redirect('admin/login');
    }

}
