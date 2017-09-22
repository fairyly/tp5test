<?php

namespace app\admin\model;

use think\Model;

class Cate extends Model
{
    //

    public  static function getLevelList() {
        $catelevel = self::order(['sort' => 'DESC', 'id' => 'ASC'])->select();
        return tree($catelevel);
    }

}
