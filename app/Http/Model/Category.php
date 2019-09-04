<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;
    protected $guarded  = [];
    //第一种方法  将分类的数据返回到控制器
//    public static function tree()
//    {
//        $category = Category::all();
//        return (new Category)->getTree($category,'cate_name','cate_pid','cate_id',0);
//    }

    //第二种方法
    public function tree()
    {
        $category = $this->orderBy('cate_order','ASC')->get();
        return $this->getTree($category,'cate_name','cate_pid','cate_id',0);
    }

    //分类树  封装分类方法，
    //$filed_name:分类名称字段名  $filed_pid：父级id字段名  $filed_id：id字段名  pid:父级id默认值
    public function getTree($data,$filed_name,$filed_pid,$filed_id,$pid)
    {
        //将循环出来的数组放在一个空数组里
        $arr =array();
        //循环出第一级分类
        foreach ($data as $k=>$v){
            if($v->$filed_pid == $pid){
                //一级分类名称
                $data[$k]["_".$filed_name] = $data[$k][$filed_name];
//                $arr[] = $v->cate_name;
                $arr[] = $data[$k];
            }
            //循环出父级id等于第一级id的数据
            foreach ($data as $m=>$n){
                if($n->$filed_pid== $v->$filed_id){
                    //二级名称
                    $data[$m]["_".$filed_name] = '|--'.$data[$m][$filed_name];
//                    $arr[] = $n->cate_name;
                    $arr[] = $data[$m];
                }
            }

        }
        return $arr;
    }
}
