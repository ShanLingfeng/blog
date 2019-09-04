<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;
    protected $guarded  = [];
    //��һ�ַ���  ����������ݷ��ص�������
//    public static function tree()
//    {
//        $category = Category::all();
//        return (new Category)->getTree($category,'cate_name','cate_pid','cate_id',0);
//    }

    //�ڶ��ַ���
    public function tree()
    {
        $category = $this->orderBy('cate_order','ASC')->get();
        return $this->getTree($category,'cate_name','cate_pid','cate_id',0);
    }

    //������  ��װ���෽����
    //$filed_name:���������ֶ���  $filed_pid������id�ֶ���  $filed_id��id�ֶ���  pid:����idĬ��ֵ
    public function getTree($data,$filed_name,$filed_pid,$filed_id,$pid)
    {
        //��ѭ���������������һ����������
        $arr =array();
        //ѭ������һ������
        foreach ($data as $k=>$v){
            if($v->$filed_pid == $pid){
                //һ����������
                $data[$k]["_".$filed_name] = $data[$k][$filed_name];
//                $arr[] = $v->cate_name;
                $arr[] = $data[$k];
            }
            //ѭ��������id���ڵ�һ��id������
            foreach ($data as $m=>$n){
                if($n->$filed_pid== $v->$filed_id){
                    //��������
                    $data[$m]["_".$filed_name] = '|--'.$data[$m][$filed_name];
//                    $arr[] = $n->cate_name;
                    $arr[] = $data[$m];
                }
            }

        }
        return $arr;
    }
}
