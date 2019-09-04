<?php

namespace App\Http\Controllers\Admin;

use App\HTTP\Model\Article;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Libs\Word;
//公共方法
class CommonController extends Controller
{
    //上传
    public function upload()
    {
//        var_dump(file_get_contents('php://input'));
        $input = Input::all();
     //获取base64位图片名
        $imgBase64 = $input['src'];
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/',$imgBase64,$res)) {
            //获取图片类型
            $type = $res[2];
            //创建路径
            $new_file = "upload/".date('Ymd',time()).'/';

            if (!file_exists($new_file)) {

                mkdir($new_file,0755,true);
            }

            //图片名称
            $new_file = $new_file.time().'.'.$type;

            if (file_put_contents($new_file,base64_decode(str_replace($res[1],'', $imgBase64)))) {

                $data=[
                    'status'=>'0',
                    'msg'=>'上传成功',
                    'img'=>$new_file
                ];
                return $data;
            } else {

                $data=[
                    'status'=>'1',
                    'msg'=>'上传失败，请稍后重试！'
                ];
                return $data;
            }
        }
    }

    //下载成word格式
    public function word($art_id)
    {
        //根据$art_id 查询数据
        $result = Article::find($art_id);
        $html = $result->art_content;
        $html = str_replace("/ueditor/php/upload/image/","E:/wamp64/www/ueditor/php/upload/image/",$html);
        $html = '<p style="text-align: center;">
    <span style="font-family: 宋体, SimSun; font-size: 24px;">'.$result->art_title.'</span>
</p>
<p style="text-align: center;">
    <span style="font-family: 宋体, SimSun; font-size: 18px;">作者：'.$result->art_editor.'</span>
</p>'.$html;
        $word = new word();
        $word->start();
        $wordname=$result->art_title.'.doc';
        echo $html;
        $word->save($wordname);
        header('Content-type:application/word');
        header('Content-Disposition: attachment; filename='.$wordname.'');
        ob_flush();//每次执行前刷新缓存
        flush();
    }

    //下载文章图片
    public function picture($art_id)
    {
        //根据$art_id 查询数据
        $result = Article::find($art_id);
        $html = $result->art_content;
        $html = str_replace("/ueditor/php/upload/image/","E:/wamp64/www/ueditor/php/upload/image/",$html);
        preg_match_all('/<img.*?src="(.*?)".*?>/is',$html,$matches);
        foreach ( $matches[0] as $key=>$url ) {
            $k=$key+1;
            echo "<a  style='display: none;' href='$url' download='$k'>$k</a>";
        }
    }

}
