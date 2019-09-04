<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\navs;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class NavsController extends CommonController
{
    public function index()
    {
        $data = Navs::orderBy('navs_order','asc')->get();
       return view('admin.navs.index',compact('data'));
    }

    //排序操作
    public function changeOrder()
    {
        $input = Input::all();
        $navs = Navs::find($input['navs_id']);
        $navs->navs_order = $input['navs_order'];
        $result = $navs->update();
        if($result){
            $data = [
                'status'=>'0',
                'msg'=>'排序更新成功！'
            ];
        }else{
            $data = [
                'status'=>'1',
                'msg'=>'排序更新失败，请重试！'
            ];
        }
        return $data;
    }
    //添加页面
    public function create()
    {
        return view('admin.navs.add');
    }
    //添加操作
    public function store()
    {
        //取出_token 字段
        $input = Input::except('_token');
        //将表单提交过来的值进行规则匹配
        $rules = [
            'navs_name'=>'required',
            'navs_url'=>'required'
        ];
        $message=[
            'navs_name.required'=>'自定义导航名字不能为空！',
            'navs_url.required'=>'自定义导航地址不能为空！'
        ];
        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $result = Navs::create($input);
            if($result){
                return redirect('admin/navs');
            }else{
                return back()->withErrors('添加失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //修改页面
    public function edit($navs_id)
    {
        //根据这个id 查询这条数据
        $field = Navs::find($navs_id);
        return view('admin.navs.edit',compact('field'));
    }
    //更新操作
    public function update($navs_id)
    {
     //获取表单传过来的值
        $input = Input::except('_method','_token');
        //根据传过来的id，然后执行更新
        $result = Navs::where('navs_id',$navs_id)->update($input);
        if($result){
            return redirect('admin/navs');
        }else{
            return back()->withErrors('更新失败，请稍后重试！');
        }
    }
    
    //删除
    public function destroy($navs_id)
    {
        //获取ajax传的所有值
        $input = Input::except('_token','_method');
        //查询这条数据
        $result= Navs::where('navs_id',$navs_id)->delete();
        if($result){
            $data = [
                'status'=>'0',
                'msg'=>'删除成功！'
            ];
        }else{
            $data = [
                'status'=>'1',
                'msg'=>'删除失败，请重试！'
            ];
        }
        return $data;
    }
}