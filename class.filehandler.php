<?php
/**
 * Created by PhpStorm.
 * User: liupengzhan
 * Date: 2017/6/8
 * Time: 22:40
 */
class FileHandler
{
    public static function readCsv($filePath)
    {
        $file = fopen($filePath, 'r');
        //忽略第一行
        fgetcsv($file);
        $goods_list = array();
        while ($data = fgetcsv($file)) { //每次读取CSV里面的一行内容
            $goods_list[] = $data;
        }
        fclose($file);
        return $goods_list;
    }

    public static function readTypeCsv($filepath)
    {
        $file = fopen($filepath,'r');
        //忽略第一行
        fgetcsv($file);
        $goods_list = array();
        while ($data = fgetcsv($file)) { //每次读取CSV里面的一行内容
            $goods_list[$data[0]] = $data;
        }
        fclose($file);
        return $goods_list;
    }
}