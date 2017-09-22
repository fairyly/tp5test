<?php
/**
 * 数组层级缩进转换
 * @param array $array
 * @param int   $pid
 * @param int   $level
 * @return array
 */
function tree($array, $pid = 0, $level = 1) {
    static $list = [];
    foreach ($array as $v) {
        if ($v['pid'] == $pid) {
            $v['level'] = $level;
            $list[]     = $v;
            tree($array, $v['id'], $level + 1);
        }
    }
    return $list;
}

/**
 * 循环删除目录和文件
 * @param string $dir_name
 * @return bool
 */
function delete_dir_file($dir_name) {
    $result = false;
    if(is_dir($dir_name)){
        if ($handle = opendir($dir_name)) {
            while (false !== ($item = readdir($handle))) {
                if ($item != '.' && $item != '..') {
                    if (is_dir($dir_name . DS . $item)) {
                        delete_dir_file($dir_name . DS . $item);
                    } else {
                        unlink($dir_name . DS . $item);
                    }
                }
            }
            closedir($handle);
            if (rmdir($dir_name)) {
                $result = true;
            }
        }
    }

    return $result;
}

/*
*获取文章第一章图片
* $text string 查找图片的文章
* return string 图片路径
*/
function headpic($str){
//1、取整个图片代码
    preg_match('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i',$str,$array);
    if ($array){
        return $array['2'];
    }else{
        return 0;
    }
}



