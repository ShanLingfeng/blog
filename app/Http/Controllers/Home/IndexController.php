<?php

namespace App\Http\Controllers\Home;

use App\HTTP\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Link;
use App\Http\Model\Navs;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends CommonController
{
    //展示首页
    public function index()
    {
        //点击量最多的3篇文章
        $hot = Article::orderBy('art_view','desc')->take(3)->get();
        //6篇特别推荐文章 按照时间，是是否推荐来查询
        $data = Article::where('art_love',1)->orderBy('art_time','desc')->take(6)->get();
        //最新5篇文章  按照时间排序
        $news = Article::orderBy('art_time','desc')->paginate(5);
        //点击量最多的6篇文章
        $hot2 = Article::orderBy('art_view','desc')->take(6)->get();
        //友情链接 按照排序查询
        $links = Link::orderBy('link_order','desc')->get();
        return view('home.index',compact('hot','data','news','links','hot2'));
    }
    //展示列表页
    public function cate($cate_id)
    {
        //查询分类表
        $field = Category::find($cate_id);
        //根据分类id查询该分类下的所有文章
        $data = Article::where('cate_id',$cate_id)->orderBy('art_time','desc')->paginate(8);
        //本栏推荐  高级使用where条件
        $number=1;
        $love = Article::select()->where('cate_id',$cate_id)->where(function($query) use ($number)  {
                $query->where('art_love', '=', $number);
        })->take(5)->get();
        //点击排行
        $order = Article::select()->where('cate_id',$cate_id)->where(function($query)  {
            $query->orderBy('art_view','desc');
        })->take(5)->get();
        return view('home.list',compact('field','data','love','order'));
    }
    //展示内容页
    public function article($art_id)
    {
        //查询文章表
        $field = Article::find($art_id);
        //查看次数累加
        Article::where('art_id',$art_id)->increment('art_view');
        //上一篇，下一篇
        $article['pre'] = Article::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
        $article['next'] = Article::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();

        //本栏推荐  高级使用where条件
        $cate_id = $field->cate_id;
        //查询分类表
        $cate = Category::find($cate_id);
        $number=1;
        $love = Article::select()->where('cate_id',$cate_id)->where(function($query) use ($number)  {
            $query->where('art_love', '=', $number);
        })->take(3)->get();
        //点击排行
        $order = Article::select()->where('cate_id',$cate_id)->where(function($query)  {
            $query->orderBy('art_view','desc');
        })->take(3)->get();
        //相关文章
        $data = Article::where('cate_id',$field->cate_id)->orderBy('art_id','desc')->take(6)->get();
        return view('home.news',compact('field','love','order','cate','article','data'));
    }
}
