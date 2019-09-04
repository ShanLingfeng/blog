<?php
/**
 * Created by PhpStorm.
 * User: mayn
 * Date: 2018/12/27
 * Time: 15:21
 */

namespace App\Libs;


class Word
{
    public function start(){
        ob_start();
        echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns="http://www.w3.org/TR/REC-html40">';
    }
    function save($path)
    {
        echo "</html>";
        $data = ob_get_contents();
    }
    function wirtefile($fn,$data){
        $fp=fopen($fp,$data);
        fwrite($fp,$data);
    }
}