<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CategoryController extends CommonController
{
    // get admin/category 显示所有分类
    public function index()
    {
        $category = (new Category)->tree();
        return view('admin.category.index')->with('data',$category);
    }
    //分类排序
    public function changeOrder()
    {
        //获取ajax传的所有值
        $input = Input::all();
        //查询这条数据
        $cate = Category::find($input['cate_id']);
//        将要修改的数据赋值
        $cate->cate_order = $input['cate_order'];
//        将这条数据更新
        $result = $cate->update();
        if($result){
            $data = [
                'status'=>'0',
                'msg'=>'分类排序更新成功！'
            ];
        }else{
            $data = [
                'status'=>'1',
                'msg'=>'分类排序更新失败，请重试！'
            ];
        }
        return $data;
    }

    //添加文章分类 只是展示页面
    public function create()
    {
        $data = Category::where('cate_pid','0')->get();
        return view('admin.category.add',compact('data',$data));
    }

    //添加文章分类  添加页面提交的方法
    public function store()
    {
        //获取input表单提交过来的值
        $input = Input::except('_token');
        //将提交过来的值进行验证
        $rules = [
            'cate_name'=>'required',
        ];
        $message = [
            'cate_name.required'=>'分类名称不能为空！'
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            //用create方法进行添加，里面的变量是表单提交过来的，但是需要进行加入白名单(fillable)或者黑名单(guarded)
            $result = Category::create($input);
            if($result){
                return redirect('admin/category');
            }else{
                return back()->with('errors','数据添加错误，请稍后重试！');
            }
        }else{
            return redirect('admin/category/create')->withErrors($validator);
        }
    }

    //修改文章分类 编辑操作 ：点击编辑，展示原始数据
//    	get   admin/category/{category}/edit
    public function edit($cate_id)
    {
//        获取cate_id  查询cate_id 数据的值
        $field = Category::find($cate_id);
        $data = Category::where('cate_pid','0')->get();
        //将查询的结果返回给修改页面
        return view('admin.category.edit',compact('field','data'));
    }
    //put  admin/category/{category}
    //进行文章分类更新操作
    public function update($cate_id)
    {
        //获取表单传过来的只
       $input = Input::except('_token','_method');
//       dd($input);
       //进行修改操作
        $result = Category::where('cate_id',$cate_id)->update($input);
        if($result){
            return redirect('admin/category');
        }else{
            return redirect('admin/category/create')->withErrors('分类更新失败，请稍后重试！');
        }
    }

    //删除数据  delete  admin/category/{category}
    public function destroy($cate_id)
    {
        //获取ajax传的所有值
        $input = Input::except('_token','_method');
        //查询这条数据
        $cate = Category::find($input['cate_id']);
        //判断是否是父级里是否有子级，如果有子级，提示不能删除 用父级的id查询子级pid，查到了就是有子类的
        $res = Category::where('cate_pid',$cate_id)->get();    //这个查询是将符合条件的所有都查询出来   而find 这是查询一条
        //查看是否为空，是空就没有子级
        if($res->first()){
            //有子级，需要将子级删除
            $data = [
                'status'=>'1',
                'msg'=>'请将子类删除后重试！'
            ];
        }else{
            //    没有子级    删除这个数据
            $result = $cate->delete();
            if($result){
                $data = [
                    'status'=>'0',
                    'msg'=>'分类删除成功！'
                ];
            }else{
                $data = [
                    'status'=>'1',
                    'msg'=>'分类删除失败，请重试！'
                ];
            }
        }
        return $data;
    }
}
