<?php

namespace App\Http\Controllers\Admin;

use App\HTTP\Model\Article;
use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommonController
{
    //首页 浏览
    public function index()
    {
        //分页
        $data = Article::orderBy('art_id','desc')->paginate(10);
       return view('admin.article.index',compact('data'));
    }

    //添加文章页面
    public function create()
    {
       $data= (new Category)->tree();
        return view('admin.article.add',compact('data'));
    }
    
    //添加操作
    public function store()
    {
        //获取表单传过来的值，去除_token
        $input = Input::except('_token','art_thumbnail');
        $input['art_time'] = time();
        if($input['cate_id']=='0'){
            return back()->with('errors','请选择分类！');
        }else{
            //将数据进行规则匹配
            $rules = [
                'art_title'=>'required',
                'art_content'=>'required'
            ];
            $message = [
                'art_title.required'=>'文章标题不能为空！',
                'art_content.required'=>'文章内容不能为空！'
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()) {
                $result = Article::create($input);
                if ($result) {
                    return redirect('admin/article');
                } else {
                    return back()->with('errors','数据添加错误，请稍后重试！');
                }
            }else{
                return redirect('admin/article/create')->withErrors($validator);
            }
        }
    }
    
    //文章编辑 页面加载
    //get  admin/article/{article}/edit
    public function edit($art_id)
    {
        //根据id查询数据
        $field = Article::find($art_id);
        //获得分类名称
        $data= (new Category)->tree();
        return view('admin.article.edit',compact('data','field'));
    }

    //文章更新
    public function update($art_id)
    {
        //获取input所有数据,去除多余的_method _token
        $input = Input::except('_token','_method','art_thumbnail');
        if(!$input['art_thumb']){
            $input['art_thumb'] = $input['art_thumb2'];
            unset($input['art_thumb2']);
        }else{
            unset($input['art_thumb2']);
        }
        //进行修改操作
//        dd($input);
        $result = Article::where('art_id',$art_id)->update($input);
        if($result){
            return redirect('admin/article/');
        }else{
            return back()->with('errors','文章更新失败，请稍后重试！');
        }
    }

    //删除文章
    public function destroy($art_id)
    {
        //获取ajax传的所有值
        $input = Input::except('_token','_method');
        //查询这条数据
        $result= Article::where('art_id',$art_id)->delete();
            if($result){
                $data = [
                    'status'=>'0',
                    'msg'=>'文章删除成功！'
                ];
            }else{
                $data = [
                    'status'=>'1',
                    'msg'=>'文章删除失败，请重试！'
                ];
            }
        return $data;
    }

    public function show()
    {
        
    }
}
