<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class IndexController extends CommonController
{
    public function index()
    {
        return view('admin.index');
    }

    public function info()
    {
        return view('admin.info');
    }
    //修改密码
    public function pass()
    {
        //获取表单数据
        if($input = Input::all()){
            //原密码不能为空
            if(!$input['password_o']=='') {
                $user_pass = Crypt::decrypt(session('user')->user_pass);
                $user_name = session('user')->user_name;
                //获取session值，将表单值进行对比
                if ($input['password_o'] == $user_pass) {
                    $rules = [
                        'password'=> 'required | between:6.,20|confirmed',
                    ];
                    $message = [
                        'password.required'=>'新密码不能为空！',
                        'password.between'=>'新密码6-20位！',
                        'password.confirmed'=>'确认密码跟新密码不一致！'
                    ];
                    //设置新密码规则 第一个参数：所要验证的数据  第二个参数：验证规则  第三个参数：将英文提示转换成中文
                    $validator = Validator::make($input,$rules,$message);
                    //检验规则是否符合
                    if($validator->passes()){
                        //如果都符合规则，则进行密码更新操作
                        //对表单提交的密码进行加密
                        $pass = Crypt::encrypt($input['password']);
                        DB::table('user')->where('user_name',$user_name)->update(['user_pass'=>$pass]);
                        return view('admin.pass')->withErrors('密码修改成功！');
                    }else{
                        return view('admin.pass')->withErrors($validator);
                    }
                } else {
                    return view('admin.pass')->withErrors('原密码错误！');
                }
            }else{
                return view('admin.pass')->withErrors('原密码不能为空！');
            }
        }
        return view('admin.pass');
    }
}
