<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Link;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LinkController extends CommonController
{
    public function index()
    {
        $data = Link::orderBy('link_order','asc')->get();
       return view('admin.links.index',compact('data'));
    }

    //排序操作
    public function changeOrder()
    {
        $input = Input::all();
        $link = Link::find($input['link_id']);
        $link->link_order = $input['link_order'];
        $result = $link->update();
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
        return view('admin.links.add');
    }
    //添加操作
    public function store()
    {
        //取出_token 字段
        $input = Input::except('_token');
        //将表单提交过来的值进行规则匹配
        $rules = [
            'link_name'=>'required',
            'link_url'=>'required'
        ];
        $message=[
            'link_name.required'=>'友情链接名字不能为空！',
            'link_url.required'=>'友情链接地址不能为空！'
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $result = Link::create($input);
            if($result){
                return redirect('admin/links');
            }else{
                return back()->withErrors('添加失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //修改页面
    public function edit($link_id)
    {
        //根据这个id 查询这条数据
        $field = Link::find($link_id);
        return view('admin.links.edit',compact('field'));
    }
    //更新操作
    public function update($link_id)
    {
     //获取表单传过来的值
        $input = Input::except('_method','_token');
        //根据传过来的id，然后执行更新
        $result = Link::where('link_id',$link_id)->update($input);
        if($result){
            return redirect('admin/links');
        }else{
            return back()->withErrors('更新失败，请稍后重试！');
        }
    }
    
    //删除
    public function destroy($link_id)
    {
        //获取ajax传的所有值
        $input = Input::except('_token','_method');
        //查询这条数据
        $result= Link::where('link_id',$link_id)->delete();
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